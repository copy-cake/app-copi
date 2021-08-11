<?php


namespace App\Core\Domain\Model\Task\GS;


use App\Core\Domain\Model\Client\Client;
use App\Core\Domain\Model\File\Files;
use App\Core\Domain\Model\Task\TaskDate;
use App\Core\Domain\Model\TypeText\TypeText;
use App\Core\Domain\Model\Users\User;
use Doctrine\Common\Collections\Collection;

trait TaskGS
{
    /**
     * @return string
     */
    public function getId(): ?string
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
     * @return TaskDate
     */
    public function getTaskDate(): TaskDate
    {
        return $this->taskDate;
    }

    /**
     * @return Client
     */
    public function getClient(): Client
    {
        return $this->client;
    }

    /**
     * @return bool
     */
    public function isStatus(): bool
    {
        return $this->status;
    }

    /**
     * @return TypeText
     */
    public function getTypeText(): TypeText
    {
        return $this->typeText;
    }

    /**
     * @return int
     */
    public function getNumberCountCharacter(): int
    {
        return $this->numberCountCharacter;
    }

    /**
     * @return User
     */
    public function getCopywriter(): User
    {
        return $this->copywriter;
    }

    /**
     * @return float
     */
    public function getSalary(): float
    {
        return $this->salary;
    }

    /**
     * @return Collection|null
     */
    public function getUsers(): ?Collection
    {
        return $this->users;
    }

    /**
     * @return Files
     */
    public function getFiles(): Files
    {
        return $this->files;
    }
}
