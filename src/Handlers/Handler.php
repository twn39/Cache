<?php

namespace Monster\Cache\Handlers;

use Monster\Cache\HandleInterface;

abstract class Handler implements HandleInterface
{
    protected $handler;

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
     * @param $value
     * @param $seconds
     *
     * @return bool
     */
    public function set($key, $value, $seconds)
    {
        $expiration = time() + $seconds;

        return $this->handler->set($key, $value, $expiration);
    }
}
