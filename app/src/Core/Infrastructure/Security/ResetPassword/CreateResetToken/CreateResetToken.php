<?php

namespace App\Core\Infrastructure\Security\ResetPassword\CreateResetToken;


use App\Core\Application\RetryPassword\UserExist\DTO\NewResetTokenDTO;
use App\Core\Domain\Model\Users\User;

final class CreateResetToken implements CreateResetTokenInterface
{
    const MIN_NUMBER = 10000000;
    const MAX_NUMBER = 99999999;

    public function createToken(): NewResetTokenDTO
    {
        $userToken = rand(self::MIN_NUMBER, self::MAX_NUMBER);

        $hashToken = password_hash($userToken, PASSWORD_ARGON2ID);

        return new NewResetTokenDTO($hashToken, $userToken);
    }
}