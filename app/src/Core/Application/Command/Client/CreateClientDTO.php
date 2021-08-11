<?php


namespace App\Core\Application\Command\Client;


final class CreateClientDTO
{
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

    /** @var int */
    private $taxNumber;

    /** @var float */
    private $salary;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getStreet(): string
    {
        return $this->street;
    }

    /**
     * @param string $street
     */
    public function setStreet(string $street): void
    {
        $this->street = $street;
    }

    /**
     * @return string
     */
    public function getZipCode(): string
    {
        return $this->zipCode;
    }

    /**
     * @param string $zipCode
     */
    public function setZipCode(string $zipCode): void
    {
        $this->zipCode = $zipCode;
    }

    /**
     * @return string
     */
    public function getNumberHouse(): string
    {
        return $this->numberHouse;
    }

    /**
     * @param string $numberHouse
     */
    public function setNumberHouse(string $numberHouse): void
    {
        $this->numberHouse = $numberHouse;
    }

    /**
     * @return int
     */
    public function getTaxNumber(): int
    {
        return $this->taxNumber;
    }

    /**
     * @param int $taxNumber
     */
    public function setTaxNumber(int $taxNumber): void
    {
        $this->taxNumber = $taxNumber;
    }

    /**
     * @return float
     */
    public function getSalary(): float
    {
        return $this->salary;
    }

    /**
     * @param float $salary
     */
    public function setSalary(float $salary): void
    {
        $this->salary = $salary;
    }
}