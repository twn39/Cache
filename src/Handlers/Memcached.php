<?php

namespace Monster\Cache\Handlers;

use Monster\Cache\HandlerInterface;

class Memcached implements HandlerInterface
{
    private $memcached;

    /**
     * Memcached constructor.
     *
     * @param \Memcached $memcached
     */
    public function __construct(\Memcached $memcached)
    {
        $this->memcached = $memcached;
    }

    /**
     * @param $key
     *
     * @return mixed
     */
    public function get($key)
    {
        return $this->memcached->get($key);
    }

    /**
     * @param $key
     * @param $value
     * @param $seconds
     *
     * @return bool
     */
    public function set($key, $value, $seconds)
    {
        return $this->memcached->set($key, $value, $seconds);
    }

    /**
     * @param array $keys
     *
     * @return mixed
     */
    public function getMulti(array $keys)
    {
        return $this->memcached->getMulti($keys);
    }

    /**
     * @param array $items
     * @param int   $seconds
     *
     * @return bool
     */
    public function setMulti(array $items, $seconds)
    {
        return $this->memcached->setMulti($items, $seconds);
    }

    /**
     * @param $key
     * @param int $offset
     *
     * @return int
     */
    public function decrement($key, $offset = 1)
    {
        return $this->memcached->decrement($key, $offset);
    }

    /**
     * @param $key
     * @param int $offset
     *
     * @return int
     */
    public function increment($key, $offset = 1)
    {
        return $this->memcached->increment($key, $offset);
    }

    /**
     * @param $key
     * @param $value
     * @param $seconds
     *
     * @return bool
     */
    public function add($key, $value, $seconds)
    {
        return $this->memcached->add($key, $value, $seconds);
    }

    /**
     * @return bool
     */
    public function flush()
    {
        return $this->memcached->flush();
    }

    /**
     * @param $key
     * @param $seconds
     *
     * @return bool
     */
    public function touch($key, $seconds)
    {
        return $this->memcached->touch($key, $seconds);
    }

    /**
     * @param $key
     *
     * @return bool
     */
    public function delete($key)
    {
        return $this->memcached->delete($key);
    }

    /**
     * @param $key
     *
     * @return mixed
     */
    public function exists($key)
    {
        $result = $this->get($key);

        return $result === false ? false : true;
    }
}
