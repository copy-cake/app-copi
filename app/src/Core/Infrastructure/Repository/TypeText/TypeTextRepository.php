<?php


namespace App\Core\Infrastructure\Repository\TypeText;


use App\Core\Domain\Model\TypeText\TypeText;
use App\Core\Domain\Model\Users\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class TypeTextRepository extends ServiceEntityRepository implements FindByOneTypeText, FindByTypeText
{

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeText::class);
    }

    public function findByOneText($id, $key = 'id'): ?TypeText
    {
        return $this->findOneBy([$key => $id]);
    }

    public function findByText(User $user): array
    {
        return $this->findBy(['user' => $user]);
    }
}