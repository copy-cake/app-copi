<?php


namespace App\Core\Domain\Model\Wallet\GS;


use App\Core\Domain\Model\Users\User;
use Doctrine\Common\Collections\ArrayCollection;

trait WalletGS
{
    /**
     * @return string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @return float
     */
    public function getEarnMoney(): float
    {
        return $this->earnMoney;
    }

    /**
     * @return User
     */
    public function getUsers(): User
    {
        return $this->users;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @return ArrayCollection
     */
    public function getWalletControl(): ArrayCollection
    {
        return $this->walletControl;
    }
}
