<?php

namespace App\Core\Application\RetryPassword\NewPassword;


use App\Core\Application\Command\User\CreateNewPassword\CreateNewUserPasswordInterface;
use App\Core\Application\RetryPassword\NewPassword\DTO\NewUserPasswordDTO;
use App\Core\Infrastructure\Repository\Users\MatchUser;
use App\Core\Infrastructure\Security\CheckTokenCsrf\CheckTokenCsrfInterface;
use App\Core\Infrastructure\Security\ResetPassword\ValidateTokenResetPasswordInterface;
use App\Shared\Domain\Exception\DifferentPasswords;
use App\Shared\Domain\Exception\InvalidUser;

final class AddNewUserPassword implements AddNewUserPasswordInterface
{
    /** @var MatchUser  */
    private MatchUser $user;

    /** @var ValidateTokenResetPasswordInterface  */
    private ValidateTokenResetPasswordInterface $validateTokenResetPassword;

    /** @var CheckTokenCsrfInterface  */
    private CheckTokenCsrfInterface $checkTokenCsrf;

    /** @var CreateNewUserPasswordInterface  */
    private CreateNewUserPasswordInterface $createNewUserPassword;

    public function __construct(
        MatchUser $user,
        ValidateTokenResetPasswordInterface $validateTokenResetPassword,
        CheckTokenCsrfInterface $checkTokenCsrf,
        CreateNewUserPasswordInterface $createNewUserPassword
    )
    {
        $this->user = $user;
        $this->validateTokenResetPassword = $validateTokenResetPassword;
        $this->checkTokenCsrf = $checkTokenCsrf;
        $this->createNewUserPassword = $createNewUserPassword;
    }

    public function addNewPassword(NewUserPasswordDTO $userPasswordDTO): void
    {
        $users = $this->user->getUser($userPasswordDTO->getUser());

        if (!$users) {
            throw new InvalidUser('User not exist. Can`t send email token to reset password.');
        }

        $this->validateTokenResetPassword->tokenIsValid($users, $userPasswordDTO->getUserToken());
        $this->checkTokenCsrf->isCorrect($users->getId(), $userPasswordDTO->getTokenCsrf());

        if ($userPasswordDTO->getNewPassword() != $userPasswordDTO->getRetryNewPassword()) {

            throw new DifferentPasswords('The passwords do not match');
        }

        $this->createNewUserPassword->newPassword($users, $userPasswordDTO->getNewPassword());
    }
}