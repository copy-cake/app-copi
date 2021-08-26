<?php

namespace App\Core\Infrastructure\RedisRepository\Users;


use App\Core\Infrastructure\RedisRepository\RedisConfig;


final class UserRedis extends RedisConfig implements GetCacheTokenStatus, AddCacheTokenStatus
{
    const FIRST_WRONG_TOKEN = 1;
    const KEY_REDIS_USER    = 'users-';
    const TIMEOUT_TOKEN     = 840;

    public function setCacheIncorrectToken(string $idUser): void
    {
        $sumIncorrectToken = $this->getCacheBadToken($idUser);
        $sumIncorrectToken += self::FIRST_WRONG_TOKEN;

        $this->createCache(self::KEY_REDIS_USER.$idUser, $sumIncorrectToken, self::TIMEOUT_TOKEN);
    }

    public function clearCacheToken(string $idUsers): void
    {
        $this->clearCache(self::KEY_REDIS_USER.$idUsers);
    }

    public function getCacheBadToken(string $idUsers): int
    {
        return $this->readCache(self::KEY_REDIS_USER.$idUsers);
    }
}