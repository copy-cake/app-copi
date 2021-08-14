<?php


namespace App\Core\Infrastructure\RedisRepository;


abstract class RedisConfig
{
    /** @var \Redis */
    private $redis;

    public function __construct()
    {
        $this->redis = new \Redis();
        $this->redis->connect('redis');
    }

    /**
     * @param string $key
     * @param $data
     */
    protected function createCache(string $key, $data): void
    {
        $this->redis->set($key, $data);
    }

    /**
     * @param string $key
     * @return false|mixed|string
     */
    protected function readCache(string $key)
    {
        return $this->redis->get($key);
    }
}