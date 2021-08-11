<?php


namespace App\Tests\Core\Application\Query\Client\GetClients;


use App\Core\Application\Command\Client\CreateClientDTO;
use App\Core\Application\Query\Client\ClientDTO;
use App\Core\Application\Query\Client\GetClients\GetClientsQuery;
use App\Core\Application\Query\Client\GetClients\GetClientsQueryHandler;
use App\Core\Domain\Model\Client\Client;
use App\Core\Domain\Model\Users\User;
use App\Core\Infrastructure\Repository\Client\UserClients;
use App\Shared\Domain\Exception\EmptyClient;
use App\Shared\Infrastructure\ValueObject\PaginatedData;
use PHPUnit\Framework\TestCase;

class GetClientsQueryHandlerTest extends TestCase
{
    /** @var UserClients|\PHPUnit\Framework\MockObject\MockObject */
    private $userClients;

    protected function setUp(): void
    {
        $this->userClients = $this->createMock(UserClients::class);
    }

    public function testShouldReturnExceptionUserDoNotHaveUsers()
    {
        $this->expectException(EmptyClient::class);

        $this->userClients
            ->method('getClients')
            ->willReturn(null);

        $command = new GetClientsQuery(new User());
        $handler = new GetClientsQueryHandler($this->userClients);
        $handler($command);
    }

    public function testShouldReturnFullyPaginationData()
    {
        $this->userClients
             ->method('getClients')
             ->willReturn($this->userClients());

        $command = new GetClientsQuery(new User());
        $handler = new GetClientsQueryHandler($this->userClients);
        $result = $handler($command);

        $this->assertInstanceOf(ClientDTO::class, $result[0]);
        $this->assertIsArray($result);
        $this->assertEquals(2, count($result));
    }

    private function userClients(): array
    {
        $createClientDTO = new CreateClientDTO();
        $createClientDTO->setSalary(14.1);
        $createClientDTO->setStreet('some street');
        $createClientDTO->setZipCode('13-412');
        $createClientDTO->setNumberHouse(12);
        $createClientDTO->setCity('some city');
        $createClientDTO->setTaxNumber('1234567890');
        $createClientDTO->setName('some name');

        $clientOne = new Client();
        $clientTwo = new Client();

        $clientOne->handler($createClientDTO);
        $clientTwo->handler($createClientDTO);

        return [$clientOne, $clientTwo];
    }

}