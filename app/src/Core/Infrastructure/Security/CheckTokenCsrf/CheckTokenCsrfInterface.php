<?php

namespace App\Core\Infrastructure\Security\CheckTokenCsrf;


interface CheckTokenCsrfInterface
{
    public function isCorrect(string $idUser, $tokenCsrf): void;
}