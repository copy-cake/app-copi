<?php


namespace App\Core\Application\Command\User;


final class UserPasswordDTO
{
    /** @var string */
    private $password;

    /** @var string */
    private $retryPassword;

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @param string $retryPassword
     */
    public function setRetryPassword(string $retryPassword): void
    {
        $this->retryPassword = $retryPassword;
    }
}