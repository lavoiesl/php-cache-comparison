<?php

namespace Lavoiesl\PhpCacheComparison\Cache;

class ApcuCache extends AbstractCache
{
    public function read($key)
    {
        return \apcu_fetch($key);
    }

    public function write($key, $data)
    {
        return \apcu_store($key, $data);
    }

    public function clear($key)
    {
        return \apcu_delete($key);
    }
}