<?php

namespace App\Core\Application\Command\User\BlockUserAccount;


use App\Core\Infrastructure\Repository\Users\MatchUser;
use App\Shared\Domain\Exception\InvalidUser;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;


final class BlockUserCommandHandler implements EventSubscriberInterface
{
    const FIELD = 'username';

    /** @var MatchUser  */
    private MatchUser $matchUser;

    /** @var EntityManagerInterface  */
    private EntityManagerInterface $entityManager;

    public function __construct(
        MatchUser $matchUser,
        EntityManagerInterface $entityManager
    )
    {
        $this->matchUser = $matchUser;
        $this->entityManager = $entityManager;
    }

    public static function getSubscribedEvents()
    {
        return[
          BlockUserCommand::NAME => 'disableAccount'
        ];
    }

    public function disableAccount(BlockUserCommand $userCommand): void
    {
        $user = $this->matchUser->getUser($userCommand->getUsername(), self::FIELD);

        if (!$user) {
            throw new InvalidUser('User no exist');
        }

        $user->disableAccount();

        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }
}