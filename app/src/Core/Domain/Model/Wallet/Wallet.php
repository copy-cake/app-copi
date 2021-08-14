<?php


namespace App\Core\Domain\Model\Wallet;


use App\Core\Domain\Model\Users\User;
use App\Core\Domain\Model\Wallet\GS\WalletGS;

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

    /** @var null|string */
    private $bankName;

    /** @var null|string */
    private $bankNumber;


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
