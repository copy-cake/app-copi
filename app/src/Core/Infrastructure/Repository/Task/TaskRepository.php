<?php


namespace App\Core\Infrastructure\Repository\Task;


use App\Core\Domain\Model\Task\Task;
use App\Core\Domain\Model\Users\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class TaskRepository extends ServiceEntityRepository implements GetUserTasks
{
     public function __construct(ManagerRegistry $registry)
     {
         parent::__construct($registry, Task::class);
     }


    public function tasks(User $user): array
    {
        return $this->findBy(['users' => $user]);
    }
}