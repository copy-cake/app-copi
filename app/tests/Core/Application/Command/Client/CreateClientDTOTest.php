<?php


namespace App\Tests\Core\Application\Command\Client;


use App\Core\Application\Command\Client\CreateClientDTO;

final class     CreateClientDTOTest
{
    public static function createClient(): CreateClientDTO
    {
        $createClientDTO = new CreateClientDTO();

        $createClientDTO->setName('Torin');
        $createClientDTO->setCity('Erebor');
        $createClientDTO->setStreet('Alone mountain');
        $createClientDTO->setNumberHouse('12');
        $createClientDTO->setSalary(12.1);
        $createClientDTO->setTaxNumber('1234567890');
        $createClientDTO->setZipCode('66-666');

        return $createClientDTO;
    }
}