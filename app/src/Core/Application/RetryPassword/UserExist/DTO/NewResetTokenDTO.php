<?php

namespace App\Core\Application\RetryPassword\UserExist\DTO;

final class NewResetTokenDTO
{
    /** @var string */
    private $hashToken;

    /** @var string */
    private $userToken;

    public function __construct(
        string $hashToken,
        string $userToken
    )
    {
        $this->hashToken = $hashToken;
        $this->userToken = $userToken;
    }

    /**
     * @return string
     */
    public function getHashToken(): string
    {
        return $this->hashToken;
    }

    /**
     * @return string
     */
    public function getUserToken(): string
    {
        return $this->userToken;
    }
}