<?php

namespace Lavoiesl\PhpCacheComparison\Cache;

abstract class AbstractCache
{
    public function connect()
    {
    }

    abstract public function read($key);

    abstract public function write($key, $data);

    abstract public function clear($key);

    public function disconnect()
    {
    }

    public function getClassName()
    {
        preg_match('/\\\\([^\\\\]+)Cache$/', get_class($this), $matches);
        return $matches[1];
    }
}