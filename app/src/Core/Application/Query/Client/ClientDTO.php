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

    /** @var string */
    private $street;

    /** @var string */
    private $zipCode;

    /** @var string */
    private $numberHouse;

    /** @var string */
    private $taxNumber;

    /** @var bool */
    private $gross;

    /** @var float */
    private $salary;

    public static function fromEntity(Client $client): ClientDTO
    {
        $dto = new static();

        $dto->id          = $client->getId();
        $dto->name        = $client->getName();
        $dto->city        = $client->getCity();
        $dto->salary      = $client->getSalary();
        $dto->street      = $client->getStreet();
        $dto->zipCode     = $client->getZipCode();
        $dto->numberHouse = $client->getNumberHouse();
        $dto->taxNumber   = $client->getTaxNumber();
        $dto->gross       = $client->isGross();

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

    /**
     * @return string
     */
    public function getStreet(): string
    {
        return $this->street;
    }

    /**
     * @return string
     */
    public function getZipCode(): string
    {
        return $this->zipCode;
    }

    /**
     * @return string
     */
    public function getNumberHouse(): string
    {
        return $this->numberHouse;
    }

    /**
     * @return string
     */
    public function getTaxNumber(): string
    {
        return $this->taxNumber;
    }

    /**
     * @return bool
     */
    public function isGross(): bool
    {
        return $this->gross;
    }
}