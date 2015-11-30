<?php

namespace Monster\Cache\Handlers;

class APCu extends Handler
{

    private $apcu;

    public function __construct()
    {
        $this->apcu = function_exists('apcu_fetch');

        if (!$this->apcu) {
            throw new \Exception("The APCu module is not loaded!");
        }
    }

    /**
     * @param $key
     * @return bool
     */
    public function exists($key)
    {
        return apcu_exists($key);
    }
    /**
     * @param $key
     * @param $value
     * @param $seconds
     * @return mixed
     */
    public function set($key, $value, $seconds)
    {
        return apcu_add($key, $value, $seconds);
    }

    /**
     * @param $key
     * @return mixed
     */
    public function get($key)
    {
        return apcu_fetch($key);
    }

    /**
     * @param array $keys
     * @return mixed
     */
    public function getMulti(array $keys)
    {
        return apcu_fetch($keys);
    }

    /**
     * @param array $items
     * @param int $seconds
     * @return bool
     */
    public function setMulti(array $items, $seconds)
    {
        foreach ($items as $key => $value) {
            $this->set($key, $value, $seconds);
        }

        return true;
    }

    /**
     * Add an item under a new key,
     * but the operation fails if the key already exists on the server.
     *
     * @param $key
     * @param $value
     * @param $seconds
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
     * @return int
     */
    public function increment($key, $offset = 1)
    {
        return apcu_inc($key, $offset);
    }

    /**
     * @param $key
     * @param $offset
     * @return int
     */
    public function decrement($key, $offset = 1)
    {
        return apcu_dec($key, $offset);
    }

    /**
     * @param $key
     * @return mixed
     */
    public function delete($key)
    {
        return apcu_delete($key);
    }

    /**
     * @return mixed
     */
    public function flush()
    {
        return apcu_clear_cache();
    }

    /**
     * Set a new expiration value on the given key.
     *
     * @param $key
     * @param $seconds
     * @return mixed
     */
    public function touch($key, $seconds)
    {
        if ($this->exists($key)) {

            $data = $this->get($key);
            $this->set($key, $data, $seconds);

        } else {

            $this->set($key, '', $seconds);

        }

        return true;
    }

}
