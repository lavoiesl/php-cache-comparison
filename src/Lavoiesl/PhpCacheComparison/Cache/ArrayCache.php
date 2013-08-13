<?php

namespace Lavoiesl\PhpCacheComparison\Cache;

class ArrayCache extends AbstractCache
{
    private $data = array();

    public function read($key)
    {
        return array_key_exists($key, $this->data)? $this->data[$key] : null;
    }

    public function write($key, $data)
    {
        return $this->data[$key] = $data;
    }

    public function clear($key)
    {
        unset($this->data[$key]);
    }
}