<?php

namespace App\Core\Infrastructure\RedisRepository\AntiBrutForce;


use App\Core\Infrastructure\RedisRepository\RedisConfig;


final class AntiBrutForceCache extends RedisConfig implements BrutForceManagerCache
{
    const KEY_REDIS_FORCE = 'brut-force-';
    const TIMEOUT_TOKEN   = 36000; // it`s 10h

    /** @var string */
    public $key;

    public function addKey(string $id): void
    {
        $this->key = $id;
    }

    public function getStatusLogin(): int
    {
        return $this->readCache(self::KEY_REDIS_FORCE.$this->key);
    }

    public function clear(): void
    {
        $this->clearCache(self::KEY_REDIS_FORCE.$this->key);
    }

    public function setWrongLogin(int $sumWrongNumber): void
    {
        $this->createCache(self::KEY_REDIS_FORCE.$this->key, $sumWrongNumber, self::TIMEOUT_TOKEN);
    }
}