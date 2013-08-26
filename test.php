<?php

require 'vendor/autoload.php';

use Lavoiesl\PhpBenchmark\Benchmark;
use Lavoiesl\PhpCacheComparison\Test;
use Doctrine\Common\Cache;

if (!function_exists('apc_fetch') && function_exists('apcu_fetch')) {
    require __DIR__ . '/fix_apcu.php';
}

$benchmark = new Benchmark;


$caches = array(
    // 'apc' => new Cache\ApcCache(),
    'file' => new Cache\FilesystemCache('/tmp/filesystemcache'),
    'phpfile' => new Cache\PhpFileCache('/tmp/phpfilecache'),
    'memcache' => new Cache\MemcacheCache(),
    'memcached' => new Cache\MemcachedCache(),
    // 'redis' => new Cache\RedisCache(),
    // 'xcache' => new Cache\XcacheCache(),
);

$memcache = new Memcache;
$memcache->connect('localhost', 11211);
$caches['memcache']->setMemcache($memcache);

$memcached = new Memcached;
$memcached->addServer('localhost', 11211);
$caches['memcached']->setMemcached($memcached);

foreach ($caches as $cache) {
    $benchmark->addTest(new Test\ReadTest($cache));
    $benchmark->addTest(new Test\WriteTest($cache));
    $benchmark->addTest(new Test\ReadWriteTest($cache));
}

$benchmark->guessCount(5);
$benchmark->run();