<?php


namespace App\Core\Domain\Model\Users\GS;


trait UsersAuthGS
{
    /**
     * @return int
     */
    public function getTypeAuth(): int
    {
        return $this->typeAuth;
    }

    /**
     * @return string
     */
    public function getCodeAuth(): string
    {
        return $this->codeAuth;
    }

    /**
     * @return \DateTime
     */
    public function getDateAuthAt(): \DateTime
    {
        return $this->dateAuthAt;
    }
}
