<?php


namespace App\Tests\Core\Application\Query\TypeText\GetTypeText;


use App\Core\Application\Command\TypeText\CreateTypeTextDTO;
use App\Core\Application\Query\TypeText\GetTypeText\TypeTextQuery;
use App\Core\Application\Query\TypeText\GetTypeText\TypeTextQueryHandler;
use App\Core\Domain\Model\TypeText\TypeText;
use App\Core\Domain\Model\Users\User;
use App\Core\Infrastructure\Repository\TypeText\FindByTypeText;
use PHPUnit\Framework\TestCase;

class TypeTextQueryHandlerTest extends TestCase
{

    const DESCRIPTION = 'some_description';

    /** @var FindByTypeText|\PHPUnit\Framework\MockObject\MockObject */
    private $findByTypeText;

    protected function setUp(): void
    {
        $this->findByTypeText = $this->createMock(FindByTypeText::class);
    }

    public function testShouldReturnEmptyTypeText()
    {
        $command = new TypeTextQuery(new User());
        $handler = new TypeTextQueryHandler($this->findByTypeText);
        $result  = $handler($command);

        $this->assertEmpty($result);
        $this->assertEquals(0, count($result));
    }

    public function testShouldReturnFullyTypeText()
    {
        $this->findByTypeText
             ->method('findByText')
             ->willReturn($this->createResponseFindTypeText());

        $command = new TypeTextQuery(new User());
        $handler = new TypeTextQueryHandler($this->findByTypeText);
        $result  = $handler($command);

        $this->assertIsArray($result);
        $this->assertEquals(2, count($result));
        $this->assertEquals(self::DESCRIPTION, $result[0]->getDestination());
    }

    private function createResponseFindTypeText(): array
    {
        $createTypeText = new CreateTypeTextDTO();
        $createTypeText->setDestination(self::DESCRIPTION);

        $firstType  = new TypeText();
        $firstType->handlerDTO($createTypeText);

        $secondType = new TypeText();
        $secondType->handlerDTO($createTypeText);

        return array($firstType, $secondType);
    }

}