<?php

namespace App\Core\Infrastructure\Security\ResetPassword\CreateCsrfToken;


use App\Core\Infrastructure\RedisRepository\Csrf\CreateCsrfSession;


final class CreateCsrfToken implements CreateCsrfTokenInterface
{
    /** @var CreateCsrfSession  */
    private CreateCsrfSession $createCsrfSession;

    public function __construct(
        CreateCsrfSession $createCsrfSession
    )
    {
        $this->createCsrfSession = $createCsrfSession;
    }

    public function createCsrfToken(string $userId): string
    {
        $tokenCsrf = bin2hex(random_bytes(32));
        $this->createCsrfSession->createSession($userId, $tokenCsrf);

        return $tokenCsrf;
    }
}