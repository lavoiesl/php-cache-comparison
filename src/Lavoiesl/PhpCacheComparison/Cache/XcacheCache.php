<?php

namespace Lavoiesl\PhpCacheComparison\Cache;

class ApcCache extends AbstractCache
{
    public function read($key)
    {
        return \xcache_get($key);
    }

    public function write($key, $data)
    {
        return \xcache_set($key, $data);
    }

    public function clear($key)
    {
        return \xcache_unset($key);
    }
}