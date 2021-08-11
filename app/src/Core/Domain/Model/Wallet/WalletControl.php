<?php


namespace App\Core\Domain\Model\Wallet;

use App\Core\Domain\Model\Users\User;
use App\Core\Domain\Model\Wallet\GS\WalletControlGS;

class WalletControl
{
    use WalletControlGS;

    /** @var string */
    private $id;

    /** @var \DateTime */
    private $createdAt;

    /** @var float */
    private $money;

    /** @var Wallet */
    private $wallet;

    /** @var User */
    private $users;

    public function __construct(
        User $user
    )
    {
        $this->id        = uuid_create();
        $this->users     = $user;
        $this->createdAt = new \DateTime();
        $this->wallet    = $user->getWallet();
        $this->money     = 0;
    }
}
