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

    /** @var int */
    private $status;

    /** @var string */
    private $createdAt;

    /** @var string */
    private $deadLine;

    /** @var string */
    private $client;

    /** @var string */
    private $clientId;

    /** @var int */
    private $numberCountCharacter;

    /** @var string */
    private $typeText;

    /** @var string */
    private $typeTextId;

    /** @var float */
    private $walletTask;

    public static function fromEntity(Task $task): TaskDTO
    {
        $client = $task->getClient();

        $dto = new static();

        $dto->id                   = $task->getId();
        $dto->titleTask            = $task->getTitleTask();
        $dto->status               = $task->getStatus();
        $dto->numberCountCharacter = $task->getNumberCountCharacter();
        $dto->createdAt            = $task->getTaskDate()->getCreateAt()->format(FormatDate::Y_M_D);
        $dto->deadLine             = $task->getTaskDate()->getDeadLineAt()->format(FormatDate::Y_M_D);
        $dto->client               = $client->getName();
        $dto->clientId             = $client->getId();
        $dto->typeTextId           = $task->getTypeText()->getId();
        $dto->typeText             = $task->getTypeText()->getDestination();
        $dto->walletTask           = $task->getWalletTask()->getMoney();

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
     * @return int
     */
    public function getStatus(): int
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
    public function getWalletTask(): float
    {
        return $this->walletTask;
    }

    /**
     * @return string
     */
    public function getDeadLine(): string
    {
        return $this->deadLine;
    }

    /**
     * @return string
     */
    public function getClientId(): string
    {
        return $this->clientId;
    }

    /**
     * @return string
     */
    public function getTypeTextId(): string
    {
        return $this->typeTextId;
    }
}