<?php

namespace Lavoiesl\PhpCacheComparison\Cache;

class MemcacheCache extends AbstractCache
{
    private $host;

    private $port;

    private $memcache;

    public function __construct($host = 'localhost', $port = 11211)
    {
        $this->host = $host;
        $this->port = $port;
        $this->memcache = new \Memcache();
    }

    public function connect()
    {
        $this->memcache->connect($this->host, $this->port);
    }

    public function read($key)
    {
        return $this->memcache->get($key);
    }

    public function write($key, $data)
    {
        return $this->memcache->set($key, $data);
    }

    public function clear($key)
    {
        return $this->memcache->delete($key);
    }

    public function disconnect()
    {
        $this->memcache->close();
    }
}