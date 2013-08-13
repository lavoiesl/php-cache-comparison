<?php

namespace Lavoiesl\PhpCacheComparison\Test;

class ReadTest extends AbstractTest
{
    protected function prepare()
    {
        parent::prepare();

        $this->cache->write($this->cache_key, $this->data);
    }

    protected function execute()
    {
        $this->cache->read($this->cache_key);
    }

    protected function cleanup()
    {
        parent::cleanup();

        $this->cache->clear($this->cache_key);
    }
}