<?php


namespace App\Core\Application\Query\Client\GetClients;


use App\Core\Application\Query\Client\ClientDTO;
use App\Core\Infrastructure\Repository\Client\UserClients;
use App\Shared\Domain\Exception\EmptyClient;
use App\Shared\Infrastructure\ValueObject\PaginatedData;

final class GetClientsQueryHandler
{
    /** @var UserClients */
    private $userClients;

    public function __construct(
        UserClients $userClients
    )
    {
        $this->userClients = $userClients;
    }

    public function __invoke(GetClientsQuery $clientsQuery): array
    {
        $clientsData = null;
        $clients     = $this->userClients->getClients($clientsQuery->getUser());

        foreach ($clients as $client) {

            $clientsData[] = ClientDTO::fromEntity($client);
        }

        return $clientsData;
    }
}