<?php


namespace App\Core\Application\Query\Client;


use App\Core\Domain\Model\Client\Client;

final class ClientDTO
{
    /** @var string */
    private $id;

    /** @var string */
    private $name;

    /** @var string */
    private $city;

    /** @var float */
    private $salary;

    public static function fromEntity(Client $client): ClientDTO
    {
        $dto = new static();

        $dto->id     = $client->getId();
        $dto->name   = $client->getName();
        $dto->city   = $client->getCity();
        $dto->salary = $client->getSalary();

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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @return float
     */
    public function getSalary(): float
    {
        return $this->salary;
    }
}