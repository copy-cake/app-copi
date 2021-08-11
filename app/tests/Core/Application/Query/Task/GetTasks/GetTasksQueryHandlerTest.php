<?php


namespace App\Tests\Core\Application\Query\Task\GetTasks;


use App\Core\Application\Query\Task\GetTasks\GetTasksQuery;
use App\Core\Application\Query\Task\GetTasks\GetTasksQueryHandler;
use App\Core\Domain\Model\Users\User;
use App\Core\Infrastructure\Repository\Task\GetUserTasks;
use PHPUnit\Framework\TestCase;

class GetTasksQueryHandlerTest extends TestCase
{
    /** @var GetUserTasks|\PHPUnit\Framework\MockObject\MockObject */
    private $getUserTasks;

    protected function setUp(): void
    {
        $this->getUserTasks = $this->createMock(GetUserTasks::class);
    }

    public function testShouldReturnEmptyArray()
    {
        $this->getUserTasks
             ->method('tasks')
             ->willReturn(array());

        $command = new GetTasksQuery(new User());
        $handler = new GetTasksQueryHandler($this->getUserTasks);
        $result  = $handler($command);

        $this->assertEmpty($result);
    }

}