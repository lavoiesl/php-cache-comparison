<?php

require 'vendor/autoload.php';

use Lavoiesl\PhpBenchmark\Benchmark;
use Lavoiesl\PhpCacheComparison\Test;
use Lavoiesl\PhpCacheComparison\Cache;

$benchmark = new Benchmark;

$caches = array(
    new Cache\ArrayCache(),
    new Cache\ApcuCache(),
    new Cache\MemcacheCache(),
);

foreach ($caches as $cache) {
    $benchmark->addTest(new Test\ReadTest($cache));
    $benchmark->addTest(new Test\WriteTest($cache));
    $benchmark->addTest(new Test\ReadWriteTest($cache));
}

$benchmark->guessCount(10);
$benchmark->run();