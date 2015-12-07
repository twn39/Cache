<?php

namespace Monster\Cache;

interface HandlerInterface
{
    /**
     * get cache.
     *
     * @param $key
     *
     * @return mixed
     */
    public function get($key);

    /**
     * @param array $keys
     *
     * @return mixed
     */
    public function getMulti(array $keys);

    /**
     * set cache.
     *
     * @param $key
     * @param $value
     * @param $ttl
     *
     * @return mixed
     */
    public function set($key, $value, $ttl);

    /**
     * @param array $items
     * @param int   $seconds
     *
     * @return mixed
     */
    public function setMulti(array $items, $seconds);

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
    public function add($key, $value, $ttl);

    /**
     * @param $key
     * @param $value
     *
     * @return mixed
     */
    public function increment($key, $value);

    /**
     * @param $key
     * @param $value
     *
     * @return mixed
     */
    public function decrement($key, $value);

    /**
     * @param $key
     *
     * @return mixed
     */
    public function delete($key);

    /**
     * @return mixed
     */
    public function flush();

    /**
     * Set a new expiration value on the given key.
     *
     * @param $key
     * @param $ttl
     *
     * @return mixed
     */
    public function touch($key, $ttl);

    /**
     * @param $key
     *
     * @return mixed
     */
    public function exists($key);
}
