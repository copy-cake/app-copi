<?php

namespace App\Core\Infrastructure\Security\ResetPassword\TimeToLiveToken;


final class TimeToLiveToken implements TimeToLiveTokenInterface
{
    const TIME = '- 12 minutes';

    public function isExpirationToken(\DateTime $dateGenerateToken): bool
    {
        $date = new \DateTime(self::TIME);

        $lastGenerateToken = $dateGenerateToken->format('Y-m-d H:i:s');
        $actualDate        = $date->format('Y-m-d H:i:s');

        if (!($actualDate > $lastGenerateToken)) {

            return false;
        }

        return true;
        /*throw new DeletedTokenPassword('Expire token to reset password');*/
    }
}