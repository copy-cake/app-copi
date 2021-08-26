<?php

namespace App\Shared\Domain\Enum\Email;

use HappyTypes\EnumerableType;

final class TypeEmail extends EnumerableType
{
    public static final function retryPassword()
    {
        return static::get(1, 'Reset password');
    }

    public static final function createdUser()
    {
        return static::get(2, 'Create you`r account');
    }
}