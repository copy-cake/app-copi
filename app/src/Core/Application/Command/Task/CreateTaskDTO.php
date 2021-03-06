<?php


namespace App\Core\Application\Command\Task;


use App\Core\Domain\Model\Client\Client;
use App\Core\Domain\Model\TypeText\TypeText;

final class CreateTaskDTO
{
    /** @var null|string */
    private $titleTask;

    /** @var null|string */
    private $deadLineAt;

    /** @var null|Client */
    private $client;

    /** @var null|TypeText */
    private $typeText;

    /** @var null|int */
    private $numberCountCharacter;

    /** @var bool */
    private $status = false;

    /**
     * @return string|null
     */
    public function getTitleTask(): ?string
    {
        return $this->titleTask;
    }

    /**
     * @param string|null $titleTask
     */
    public function setTitleTask(?string $titleTask): void
    {
        $this->titleTask = $titleTask;
    }

    /**
     * @return string|null
     */
    public function getDeadLineAt(): ?string
    {
        return $this->deadLineAt;
    }

    /**
     * @param string|null $deadLineAt
     */
    public function setDeadLineAt(?string $deadLineAt): void
    {
        $this->deadLineAt = $deadLineAt;
    }

    /**
     * @return Client|null
     */
    public function getClient(): ?Client
    {
        return $this->client;
    }

    /**
     * @param Client|null $client
     */
    public function setClient(?Client $client): void
    {
        $this->client = $client;
    }

    /**
     * @return TypeText|null
     */
    public function getTypeText(): ?TypeText
    {
        return $this->typeText;
    }

    /**
     * @param TypeText|null $typeText
     */
    public function setTypeText(?TypeText $typeText): void
    {
        $this->typeText = $typeText;
    }

    /**
     * @return int|null
     */
    public function getNumberCountCharacter(): ?int
    {
        return $this->numberCountCharacter;
    }

    /**
     * @param int|null $numberCountCharacter
     */
    public function setNumberCountCharacter(?int $numberCountCharacter): void
    {
        $this->numberCountCharacter = $numberCountCharacter;
    }

    /**
     * @return bool
     */
    public function getStatus(): bool
    {
        return $this->status;
    }

    /**
     * @param bool $status
     */
    public function setStatus(?bool $status): void
    {
        $this->status = $status;
    }
}