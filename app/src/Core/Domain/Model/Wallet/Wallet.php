<?php


namespace App\Core\Domain\Model\Wallet;


use App\Core\Domain\Model\Users\User;
use App\Core\Domain\Model\Wallet\GS\WalletGS;
use Doctrine\Common\Collections\ArrayCollection;

class Wallet
{
    use WalletGS;

    /** @var string */
    private $id;

    /** @var float */
    private $earnMoney;

    /** @var User */
    private $users;

    /** @var \DateTime */
    private $updatedAt;

    /** @var ArrayCollection */
    private $walletControl;

    public function __construct(
    )
    {
        $this->id        = uuid_create();
        $this->updatedAt = new \DateTime();
        $this->earnMoney = 0.0;
    }


    public function createWallet()
    {
        $walletControl = new WalletControl();
    }
}
