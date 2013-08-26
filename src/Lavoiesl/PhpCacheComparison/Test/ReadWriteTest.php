<?php

namespace Lavoiesl\PhpCacheComparison\Test;

class ReadWriteTest extends AbstractTest
{
    protected function execute()
    {
        $this->cache->save($this->cache_key, $this->data);
        $this->cache->fetch($this->cache_key);
    }
}