<?php


namespace App\Core\Application\Command\Task\UpdateTask;


use App\Core\Domain\Logic\CalculatePayout\CalculatePayoutInterface;
use App\Core\Infrastructure\Repository\Task\MatchTask;
use App\Shared\Domain\Exception\InvalidTask;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

final class UpdateTaskCommandHandler implements EventSubscriberInterface
{
    /** @var EntityManagerInterface  */
    private EntityManagerInterface $entityManager;

    /** @var MatchTask  */
    private MatchTask $matchTask;

    /** @var CalculatePayoutInterface  */
    private CalculatePayoutInterface $calculatePayout;

    public function __construct(
        EntityManagerInterface $entityManager,
        MatchTask $matchTask,
        CalculatePayoutInterface $calculatePayout
    )
    {
        $this->entityManager = $entityManager;
        $this->matchTask = $matchTask;
        $this->calculatePayout = $calculatePayout;
    }

    public static function getSubscribedEvents()
    {
        return[
          UpdateTaskCommand::NAME => 'updateTask'
        ];
    }

    public function updateTask(UpdateTaskCommand $command): void
    {
        $createTaskDTO  = $command->getCreateTaskDTO();
        $client         = $createTaskDTO->getClient();

        $updatedTask    = $this->matchTask->foundTask($command->getTaskId());

        if (!$updatedTask) {
            throw new InvalidTask('No found task');
        }

        $paymentMoney  = $this->calculatePayout->myPayment($client->getSalary(), $createTaskDTO->getNumberCountCharacter());

        $updatedTask->factoryTask($createTaskDTO, $paymentMoney);

        $this->entityManager->persist($updatedTask);
        $this->entityManager->flush();
    }
}