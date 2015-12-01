<?php

namespace Monster\Cache\Handlers;

use Monster\Cache\HandleInterface;

abstract class Handler implements HandleInterface
{
    abstract public function set($key, $value, $seconds);

    abstract public function get($key);

    abstract public function increment($key, $value);

    abstract public function decrement($key, $value);

    abstract public function flush();
}
