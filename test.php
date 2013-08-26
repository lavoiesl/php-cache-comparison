<?php

require 'vendor/autoload.php';

use Lavoiesl\PhpBenchmark\Benchmark;
use Lavoiesl\PhpCacheComparison\Test;
use Lavoiesl\Doctrine\CacheDetector\CacheChooser;
use Lavoiesl\Doctrine\CacheDetector\Detector\AbstractDetector;
use Lavoiesl\Doctrine\CacheDetector\Detector\ApcDetector;
use Doctrine\Common\Cache;

ApcDetector::createAPCuAliases();

$chooser = new CacheChooser;
$detectors = $chooser->getSupportedDetectors(AbstractDetector::PERSISTANCE_LOCAL_SERVICE);

$benchmark = new Benchmark;

foreach ($detectors as $detector) {
    $cache = $detector->getCache();
    $benchmark->addTest(new Test\ReadTest($cache));
    $benchmark->addTest(new Test\WriteTest($cache));
    $benchmark->addTest(new Test\ReadWriteTest($cache));
}

@$benchmark->guessCount(1);
$benchmark->run();
