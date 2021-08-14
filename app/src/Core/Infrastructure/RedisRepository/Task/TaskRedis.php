<?php


namespace App\Core\Infrastructure\RedisRepository\Task;


use App\Core\Infrastructure\RedisRepository\RedisConfig;

class TaskRedis extends RedisConfig
{
    public function addCache(string $key, $data): void
    {
        $this->createCache($key, $data);
    }
}