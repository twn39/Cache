<?php

namespace Monster\Cache\Handlers;

class Redis extends Handler
{
    private $predis;
    /**
     * Redis constructor.
     *
     * @param \Predis $redis
     */
    public function __construct(\Predis $redis)
    {
        $this->predis = $redis;
    }


    /**
     * @param $key
     * @param $value
     * @param $seconds
     * @return mixed
     */
    public function set($key, $value, $seconds)
    {
        return $this->predis->set($key, $value, $seconds);
    }

    /**
     * @param $key
     * @return mixed
     */
    public function get($key)
    {
        return $this->predis->get($key);
    }

    /**
     * @param array $keys
     *
     * @return mixed
     */
    public function getMulti(array $keys)
    {
        return $this->predis->mget($keys);
    }

    /**
     * @param array $items
     * @param int   $seconds
     *
     * @return mixed
     */
    public function setMulti(array $items, $seconds)
    {
        return $this->predis->mset($items);
    }

    /**
     * Add an item under a new key,
     * but the operation fails if the key already exists on the server.
     *
     * @param $key
     * @param $value
     * @param $seconds
     *
     * @return mixed
     */
    public function add($key, $value, $seconds)
    {
        if (!$this->exists($key)) {
            $this->set($key, $value, $seconds);
        }

        return true;
    }

    /**
     * @param $key
     * @param $offset
     *
     * @return mixed
     */
    public function increment($key, $offset = 1)
    {
        return $this->predis->incrby($key, $offset);
    }

    /**
     * @param $key
     * @param $offset
     *
     * @return mixed
     */
    public function decrement($key, $offset = 1)
    {
        return $this->predis->decrby($key, $offset);
    }

    /**
     * @param $key
     *
     * @return mixed
     */
    public function delete($key)
    {
        return $this->predis->del($key);
    }

    /**
     * @return mixed
     */
    public function flush()
    {
        return $this->predis->flushdb();
    }

    /**
     * Set a new expiration value on the given key.
     *
     * @param $key
     * @param $seconds
     *
     * @return mixed
     */
    public function touch($key, $seconds)
    {
        if ($this->exists($key)) {
            $value = $this->get($key);
            $this->set($key, $value, $seconds);
        } else {
            $this->set($key, '', $seconds);
        }

        return true;
    }

    /**
     * @param $key
     *
     * @return mixed
     */
    public function exists($key)
    {
        return $this->predis->exists($key);
    }
}
