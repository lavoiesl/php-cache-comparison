<?php

namespace Lavoiesl\PhpCacheComparison\Test;

class WriteTest extends AbstractTest
{
    protected function execute()
    {
        $this->cache->save($this->cache_key, $this->data);
    }
}
