<?php

namespace App\Core\Infrastructure\Notification\FactoryEmil;


use App\Core\Infrastructure\Notification\NotificationEmil;
use App\Shared\Domain\Enum\Email\TypeEmail;

final class FactoryEmail
{
    public static function resetPassword(string $email, string $userToken): NotificationEmil
    {
        return new NotificationEmil(
            TypeEmail::retryPassword()->id(),
            $email,
            [
                'newToken' => $userToken
            ]
        );
    }
}