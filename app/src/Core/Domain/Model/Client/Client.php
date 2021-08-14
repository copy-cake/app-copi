<?php


namespace App\Core\Domain\Model\Client;


use App\Core\Application\Command\Client\CreateClientDTO;
use App\Core\Domain\Model\Client\GS\ClientGS;
use App\Core\Domain\Model\Users\User;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class Client
{
    use ClientGS;

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

    /** @var int */
    private $taxNumber;

    /** @var \DateTime */
    private $createAt;

    /** @var User */
    private $user;

    /** @var Collection */
    private $task;

    /** @var float */ /*the rate for the task. Put in only netto*/
    private $salary;

    /** @var bool */
    private $gross;

    public function __construct()
    {
        $this->id       = uuid_create();
        $this->createAt = new \DateTime();
    }

    public function handler(
        CreateClientDTO $createClientDTO
    )
    {
        $this->name        = $createClientDTO->getName();
        $this->city        = $createClientDTO->getCity();
        $this->street      = $createClientDTO->getStreet();
        $this->zipCode     = $createClientDTO->getZipCode();
        $this->numberHouse = $createClientDTO->getNumberHouse();
        $this->taxNumber   = $createClientDTO->getTaxNumber();
        $this->salary      = $createClientDTO->getSalary();
    }

    public function handlerUser(
        User $user
    )
    {
        $this->user = $user;
    }
}
