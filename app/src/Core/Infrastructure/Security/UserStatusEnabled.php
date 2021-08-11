<?php


namespace App\Core\Infrastructure\Security;


use App\Core\Domain\Model\Users\User;
use Symfony\Component\Security\Core\Exception\DisabledException;
use Symfony\Component\Security\Core\User\UserCheckerInterface;
use Symfony\Component\Security\Core\User\UserInterface;


final class UserStatusEnabled implements UserCheckerInterface
{

    public function checkPreAuth(UserInterface $user)
    {
        if (!$user instanceof User) {

            throw new DisabledException('no_exist_user');
        }

        if (!$user->isEnabled()) {

            throw new DisabledException('disabled_user');
        }
    }

    public function checkPostAuth(UserInterface $user)
    {
        //dump('checkPostAuth');
    }

}