<?php

namespace Lavoiesl\PhpCacheComparison\Test;

use Lavoiesl\PhpBenchmark\AbstractTest as BaseTest;
use Lavoiesl\PhpCacheComparison\TestObject;
use Doctrine\Common\Cache\Cache;
use Lavoiesl\PhpCacheComparison\cache\AbstractCache;

abstract class AbstractTest extends BaseTest
{
    protected $data;

    protected $cache;

    protected $size;

    protected $cache_key;

    public function __construct(Cache $cache, $size = 64)
    {
        parent::__construct(self::getCacheName($cache) . '-' . static::getClassName());

        $this->cache = $cache;
        $this->cache_key = uniqid();
        $this->size = $size;
    }

    protected function prepare()
    {
        $this->data = array();

        $size = ceil($this->size / 4);

        for ($i=0; $i < 4; $i++) {
            $obj = new TestObject;
            $obj->fill($size);
            $this->data[] = $obj;
        }
    }

    protected function cleanup()
    {
        $this->data = null;
        $this->cache->deleteAll();
    }

    public static function getClassName()
    {
        preg_match('/\\\\([^\\\\]+)Test$/', get_called_class(), $matches);
        return $matches[1];
    }

    public static function getCacheName(Cache $cache)
    {
        preg_match('/\\\\([^\\\\]+)Cache$/', get_class($cache), $matches);
        return $matches[1];
    }
}
