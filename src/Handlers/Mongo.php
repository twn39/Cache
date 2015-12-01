<?php

namespace Monster\Cache\Handlers;

class Mongo extends Handler
{
    /**
     * @param array $keys
     *
     * @return mixed
     */
    public function getMulti(array $keys)
    {
        // TODO: Implement getMulti() method.
    }

    /**
     * @param array $items
     * @param int   $seconds
     *
     * @return mixed
     */
    public function setMulti(array $items, $seconds)
    {
        // TODO: Implement setMulti() method.
    }

    /**
     * Add an item under a new key,
     * but the operation fails if the key already exists on the server.
     *
     * @param $key
     * @param $value
     * @param $ttl
     *
     * @return mixed
     */
    public function add($key, $value, $ttl)
    {
        // TODO: Implement add() method.
    }

    /**
     * @param $key
     *
     * @return mixed
     */
    public function delete($key)
    {
        // TODO: Implement delete() method.
    }

    /**
     * Set a new expiration value on the given key.
     *
     * @param $key
     * @param $ttl
     *
     * @return mixed
     */
    public function touch($key, $ttl)
    {
        // TODO: Implement touch() method.
    }

    /**
     * @param $key
     *
     * @return mixed
     */
    public function exists($key)
    {
        // TODO: Implement exists() method.
    }

    public function set($key, $value, $seconds)
    {
        // TODO: Implement set() method.
    }

    public function get($key)
    {
        // TODO: Implement get() method.
    }

    public function increment($key, $value)
    {
        // TODO: Implement increment() method.
    }

    public function decrement($key, $value)
    {
        // TODO: Implement decrement() method.
    }

    public function flush()
    {
        // TODO: Implement flush() method.
    }
}
