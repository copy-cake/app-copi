<?php


namespace App\Core\Domain\Model\Users;


use App\Core\Domain\Model\Users\GS\UsersAuthGS;

final class UsersAuth
{
    use UsersAuthGS;

    /** @var int */
    private $typeAuth;

    /** @var string */
    private $codeAuth;

    /** @var \DateTime */
    private $dateAuthAt;
}
