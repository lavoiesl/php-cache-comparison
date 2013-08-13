<?php

namespace Lavoiesl\PhpCacheComparison\Test;

use Lavoiesl\PhpBenchmark\AbstractTest as BaseTest;
use Lavoiesl\PhpCacheComparison\TestObject;
use Lavoiesl\PhpCacheComparison\cache\AbstractCache;

abstract class AbstractTest extends BaseTest
{
    protected $data = array();

    protected $cache;

    protected $size;

    protected $cache_key;

    public function __construct(AbstractCache $cache, $size = 64)
    {
        parent::__construct($cache->getClassName() . '-' . $this->getClassName());

        $this->cache = $cache;
        $this->cache_key = uniqid();
        $this->size = $size;
    }

    protected function prepare()
    {
        $size = ceil($this->size / 4);

        for ($i=0; $i < 4; $i++) { 
            $this->data[] = new TestObject($size);
        }

        $this->cache->connect();
    }

    protected function cleanup()
    {
        $this->cache->disconnect();
    }

    public function getClassName()
    {
        preg_match('/\\\\([^\\\\]+)Test$/', get_class($this), $matches);
        return $matches[1];
    }
}