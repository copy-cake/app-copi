<?php


namespace App\Core\Application\Query\Task;


use App\Core\Domain\Model\Task\Task;
use App\Shared\Domain\Enum\FormatDate;

final class TaskDTO
{
    /** @var string */
    private $id;

    /** @var string */
    private $titleTask;

    /** @var boolean */
    private $status;

    /** @var string */
    private $createdAt;

    /** @var string */
    private $client;

    /** @var int */
    private $numberCountCharacter;

    /** @var string */
    private $typeText;

    /** @var float */
    private $walletControl;

    public static function fromEntity(Task $task): TaskDTO
    {
        $client = $task->getClient();

        $dto = new static();

        $dto->id                   = $task->getId();
        $dto->titleTask            = $task->getTitleTask();
        $dto->status               = $task->isStatus();
        $dto->numberCountCharacter = $task->getNumberCountCharacter();
        $dto->createdAt            = $task->getTaskDate()->getCreateAt()->format(FormatDate::Y_M_D);
        $dto->client               = $client->getName();
        $dto->typeText             = $task->getTypeText()->getDestination();
      //  $dto->walletControl        = $task->get

        return $dto;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitleTask(): string
    {
        return $this->titleTask;
    }

    /**
     * @return bool
     */
    public function isStatus(): bool
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    /**
     * @return string
     */
    public function getClient(): string
    {
        return $this->client;
    }

    /**
     * @return int
     */
    public function getNumberCountCharacter(): int
    {
        return $this->numberCountCharacter;
    }

    /**
     * @return string
     */
    public function getTypeText(): string
    {
        return $this->typeText;
    }

    /**
     * @return float
     */
    public function getWalletControl(): float
    {
        return $this->walletControl;
    }
}