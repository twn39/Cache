<?php

namespace Monster\Cache;

use Monster\Cache\Handlers\Handler;

class Cache
{
    private $handler;

    /**
     * Cache constructor.
     *
     * @param Handler $handler
     */
    public function __construct(Handler $handler)
    {
        $this->handler = $handler;
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
        return $this->handler->set($key, $value, $seconds);
    }

    /**
     * @param $key
     *
     * @return mixed
     */
    public function get($key)
    {
        return $this->handler->get($key);
    }

    /**
     * @param $key
     * @param int $offset
     *
     * @return int
     */
    public function increment($key, $offset = 1)
    {
        return $this->handler->increment($key, $offset);
    }

    /**
     * @param $key
     * @param int $offset
     *
     * @return int
     */
    public function decrement($key, $offset = 1)
    {
        return $this->handler->decrement($key, $offset);
    }

    /**
     * @param $key
     * @param $value
     *
     * @return bool
     */
    public function forever($key, $value)
    {
        return $this->handler->set($key, $value, 0);
    }

    /**
     * @param $key
     *
     * @return mixed
     */
    public function forget($key)
    {
        return $this->delete($key);
    }

    /**
     * @param $key
     *
     * @return mixed
     */
    public function delete($key)
    {
        return $this->handler->delete($key);
    }

    /**
     * Get an item from the cache, or store the default value.
     *
     * @param $key
     * @param $seconds
     * @param \Closure $callback
     *
     * @return mixed
     */
    public function remember($key, $seconds, \Closure $callback)
    {
        $value = $this->get($key);
        if ($value !== false) {
            return $value;
        } else {
            $this->set($key, $value = $callback(), $seconds);

            return $value;
        }
    }

    /**
     * @param $key
     * @param \Closure $callback
     *
     * @return mixed
     */
    public function rememberForever($key, \Closure $callback)
    {
        $value = $this->get($key);
        if ($value !== false) {
            return $value;
        } else {
            $this->forever($key, $value = $callback());

            return $value;
        }
    }

    /**
     * @param $key
     * @param \Closure $callback
     *
     * @return mixed
     */
    public function sear($key, \Closure $callback)
    {
        return $this->rememberForever($key, $callback);
    }

    /**
     * @param $key
     *
     * @return mixed
     */
    public function exists($key)
    {
        return $this->handler->exists($key);
    }

    /**
     * @param $key
     *
     * @return mixed
     */
    public function has($key)
    {
        return $this->exists($key);
    }

    /**
     * @param $key
     *
     * @return mixed
     */
    public function pull($key)
    {
        $value = $this->get($key);
        $this->delete($key);

        return $value;
    }
}
