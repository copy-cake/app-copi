<?php

namespace App\Core\Infrastructure\Security\AntiBrutForce;

use App\Core\Application\Command\User\BlockUserAccount\BlockUserCommand;
use App\Core\Infrastructure\RedisRepository\AntiBrutForce\BrutForceManagerCache;
use App\Shared\Domain\Exception\BrutForceLoginException;
use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationFailureEvent;
use Lexik\Bundle\JWTAuthenticationBundle\Events;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

final class HandlerFailLoginUser implements EventSubscriberInterface
{
    const MAX_INCORRECT_LOGIN = 2;
    const ADD_INCORRECT_LOGIN = 1;

    /** @var BrutForceManagerCache  */
    private BrutForceManagerCache $brutForceManagerCache;

    /** @var EventDispatcherInterface  */
    private EventDispatcherInterface $eventDispatcher;

    public function __construct(
        BrutForceManagerCache $brutForceManagerCache,
        EventDispatcherInterface $eventDispatcher
    )
    {
        $this->brutForceManagerCache = $brutForceManagerCache;
        $this->eventDispatcher = $eventDispatcher;
    }

    public static function getSubscribedEvents()
    {
        return[
            Events::AUTHENTICATION_FAILURE => 'addIncorrectLogin'
        ];
    }

    public function addIncorrectLogin(AuthenticationFailureEvent $forceLogin): void
    {
        $incorrectLogin = $forceLogin->getException()->getToken()->getUser();

        $this->brutForceManagerCache->addKey($incorrectLogin);
        $sumIncorrectLogin = $this->brutForceManagerCache->getStatusLogin();

        if ($sumIncorrectLogin > self::MAX_INCORRECT_LOGIN) {

            $this->eventDispatcher->dispatch(new BlockUserCommand($incorrectLogin), BlockUserCommand::NAME);
            $this->brutForceManagerCache->clear();
            throw new BrutForceLoginException('Too many incorrect logins. You`r account is disabled.');
        }

        $sumIncorrectLogin += self::ADD_INCORRECT_LOGIN;
        $this->brutForceManagerCache->setWrongLogin($sumIncorrectLogin);
    }
}