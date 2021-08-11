<?php


namespace App\Core\Infrastructure\Repository\Client;


use App\Core\Domain\Model\Client\Client;
use App\Core\Domain\Model\Users\User;
use App\Shared\Domain\Exception\BadCompany;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ClientRepository extends ServiceEntityRepository implements MatchClientInterface, ClientRepositoryInterface, UserClients
{

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Client::class);
    }

    public function add(Client $client): void
    {
        $this->getEntityManager()->persist($client);
        $this->getEntityManager()->flush();
    }

    public function foundClient(string $idClient): Client
    {
        $client = $this->find($idClient);

        if (!$client){
            throw new BadCompany('Company no exist.');
        }

        return $client;
    }

    public function getClients(User $user): ?array
    {
        return $this->findBy(['user' => $user]);
    }
}