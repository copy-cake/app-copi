<?php

namespace App\Core\Infrastructure\Event\EventSubscriber;


use App\Core\Application\RetryPassword\UserExist\CheckUserExist\CreateResetTokenPasswordInterface;
use App\Shared\Domain\Exception\InvalidResetToken;
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
            }
        } while (null !== $exception = $exception->getPrevious());
    }


    private function refreshToken(ExceptionEvent $event)
    {
        $exception = $event->getThrowable();
        $response  = new JsonResponse($exception->getMessage(), Response::HTTP_BAD_REQUEST);
        $event->setResponse($response);
    }
}