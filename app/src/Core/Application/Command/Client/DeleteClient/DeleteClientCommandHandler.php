<?php


namespace App\Core\Application\Command\Client\DeleteClient;


use App\Core\Infrastructure\Repository\Client\MatchClientInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

final class DeleteClientCommandHandler implements EventSubscriberInterface
{
    /** @var EntityManagerInterface  */
    private EntityManagerInterface $entityManager;

    /** @var MatchClientInterface  */
    private MatchClientInterface $matchClient;

    public function __construct(
        EntityManagerInterface $entityManager,
        MatchClientInterface $matchClient
    )
    {
        $this->entityManager = $entityManager;
        $this->matchClient = $matchClient;
    }

    public static function getSubscribedEvents()
    {
        return[
          DeleteClientCommand::NAME => 'deleteClient'
        ];
    }

    public function deleteClient(DeleteClientCommand $clientCommand): void
    {
        $client = $this->matchClient->foundClient($clientCommand->getClientId());

        $this->entityManager->remove($client);
        $this->entityManager->flush();
    }
}