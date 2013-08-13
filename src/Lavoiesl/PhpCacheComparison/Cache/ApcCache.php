<?php

namespace Lavoiesl\PhpCacheComparison\Cache;

class ApcCache extends AbstractCache
{
    public function read($key)
    {
        return \apc_fetch($key);
    }

    public function write($key, $data)
    {
        return \apc_store($key, $data);
    }

    public function clear($key)
    {
        return \apc_delete($key);
    }
}