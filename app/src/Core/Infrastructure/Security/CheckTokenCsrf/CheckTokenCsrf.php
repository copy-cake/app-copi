<?php

namespace App\Core\Infrastructure\Security\CheckTokenCsrf;


use App\Core\Infrastructure\RedisRepository\Csrf\GetCsrfSession;
use App\Shared\Domain\Exception\InvalidCsrfToken;

final class CheckTokenCsrf implements CheckTokenCsrfInterface
{
    /** @var GetCsrfSession  */
    private GetCsrfSession $getCsrfSession;

    public function __construct(
        GetCsrfSession $getCsrfSession
    )
    {
        $this->getCsrfSession = $getCsrfSession;
    }

    public function isCorrect(string $idUser, $tokenCsrf): void
    {
        $csrfSession = $this->getCsrfSession->getSession($idUser);

        if ($csrfSession !== $tokenCsrf) {

            throw new InvalidCsrfToken('Csrf token is invalid');
        }
    }
}