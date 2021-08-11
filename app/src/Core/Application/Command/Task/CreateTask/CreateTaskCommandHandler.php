<?php


namespace App\Core\Application\Command\Task\CreateTask;


use App\Core\Domain\Logic\CalculatePayout\CalculatePayoutInterface;
use App\Core\Domain\Model\Task\Task;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class CreateTaskCommandHandler implements EventSubscriberInterface
{
    /** @var EntityManagerInterface */
    private $entityManager;

    /** @var CalculatePayoutInterface  */
    private CalculatePayoutInterface $calculatePayout;

    public function __construct(
        EntityManagerInterface $entityManager,
        CalculatePayoutInterface $calculatePayout
    )
    {
        $this->entityManager = $entityManager;
        $this->calculatePayout = $calculatePayout;
    }

    public static function getSubscribedEvents()
    {
        return [
            CreateTaskCommand::NAME => 'createTask'
        ];
    }

    public function createTask(CreateTaskCommand $command): void
    {
        $client        = $command->getCreateTaskDTO()->getClient();
        $createTaskDTO = $command->getCreateTaskDTO();

        $paymentMoney  = $this->calculatePayout->myPayment($client->getSalary(), $createTaskDTO->getNumberCountCharacter(), $client->isGross());

        $task = new Task($createTaskDTO);
        $task->createWalletControl($command->getUser(), $paymentMoney);

        $this->entityManager->persist($task);
        $this->entityManager->flush();
    }
}
