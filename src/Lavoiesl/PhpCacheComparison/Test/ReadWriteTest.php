<?php

namespace Lavoiesl\PhpCacheComparison\Test;

class ReadWriteTest extends AbstractTest
{
    protected function execute()
    {
        $this->cache->write($this->cache_key, $this->data);
        $this->cache->read($this->cache_key);
        $this->cache->clear($this->cache_key);
    }
}