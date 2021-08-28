<?php

namespace App\Core\Infrastructure\Event\EventSubscriber;


use App\Core\Application\RetryPassword\UserExist\CheckUserExist\CreateResetTokenPasswordInterface;
use App\Shared\Domain\Exception\BrutForceLoginException;
use App\Shared\Domain\Exception\DisabledAccount;
use App\Shared\Domain\Exception\InvalidResetToken;
use App\Shared\Domain\Exception\InvalidUser;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\KernelEvents;

final class ExceptionTokenHandler implements EventSubscriberInterface
{
    /** @var CreateResetTokenPasswordInterface  */
    private CreateResetTokenPasswordInterface $resetTokenPassword;

    public function __construct(
        CreateResetTokenPasswordInterface $resetTokenPassword
    )
    {
        $this->resetTokenPassword = $resetTokenPassword;
    }

    public static function getSubscribedEvents()
    {
        return[
            KernelEvents::EXCEPTION => [
                ['processException', -10]
            ]
        ];
    }

    public function processException(ExceptionEvent $event)
    {
        $exception = $event->getThrowable();
        do {
            if ($exception instanceof InvalidResetToken) {

                $this->refreshToken($event);
                return;
            } elseif ($exception instanceof BrutForceLoginException) {

                $this->refreshToken($event);
                return;
            } elseif ($exception instanceof DisabledAccount) {

                $this->refreshToken($event);
                return;
            } elseif ($exception instanceof InvalidUser) {

                $this->invalidUser($event);
                return;
            }
        } while (null !== $exception = $exception->getPrevious());
    }


    private function refreshToken(ExceptionEvent $event)
    {
        $exception = $event->getThrowable();
        $response  = new JsonResponse($exception->getMessage(), Response::HTTP_BAD_REQUEST);
        $event->setResponse($response);
    }

    private function invalidUser(ExceptionEvent $event)
    {
        $response  = new JsonResponse(null, Response::HTTP_NO_CONTENT);
        $event->setResponse($response);
    }
}