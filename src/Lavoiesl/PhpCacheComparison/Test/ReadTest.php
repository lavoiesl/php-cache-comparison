<?php

namespace Lavoiesl\PhpCacheComparison\Test;

class ReadTest extends AbstractTest
{
    protected function prepare()
    {
        parent::prepare();

        $this->cache->save($this->cache_key, $this->data);
    }

    protected function execute()
    {
        $this->cache->fetch($this->cache_key);
    }
}
