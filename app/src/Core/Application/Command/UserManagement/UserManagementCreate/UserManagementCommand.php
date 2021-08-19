<?php

namespace App\Core\Application\Command\UserManagement\UserManagementCreate;


use App\Core\Application\Command\UserManagement\UserManagementCreate;
use App\Core\Domain\Model\Users\User;

final class UserManagementCommand
{
    public const NAME = 'user.wallet';

    /** @var User  */
    private User $user;

    /** @var UserManagementCreate  */
    private UserManagementCreate $managementCreate;

    public function __construct(
        User $user,
        UserManagementCreate $managementCreate
    )
    {
        $this->user = $user;
        $this->managementCreate = $managementCreate;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @return UserManagementCreate
     */
    public function getManagementCreate(): UserManagementCreate
    {
        return $this->managementCreate;
    }
}