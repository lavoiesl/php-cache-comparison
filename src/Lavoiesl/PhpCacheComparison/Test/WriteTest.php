<?php

namespace Lavoiesl\PhpCacheComparison\Test;

class WriteTest extends AbstractTest
{
    protected function execute()
    {
        $this->cache->write($this->cache_key, $this->data);
    }

    protected function cleanup()
    {
        parent::cleanup();

        $this->cache->clear($this->cache_key);
    }
}