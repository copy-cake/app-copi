<?php

namespace App\Core\Application\Query\UserManagement\GetUserWallet;

use App\Core\Domain\Model\Users\User;

final class UserWalletQuery
{
    /** @var User  */
    private User $user;

    public function __construct(
        User $user
    )
    {
        $this->user = $user;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }
}