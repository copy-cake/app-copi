<?php


namespace App\Core\Ports\Rest\Task;


use App\Core\Application\Command\Task\CreateTask\CreateTaskCommand;
use App\Core\Infrastructure\Form\Task\TaskType;
use App\Core\Ports\Rest\CreateRestApi;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/api")
 */
class TaskController extends CreateRestApi
{
    /**
     * @Route("/task", methods={"POST"})
     */
    public function indexAction(
        Request $request,
        EventDispatcherInterface $eventDispatcher
    )
    {
        $taskForm = $this->buildObject($request, TaskType::class);

        $eventDispatcher->dispatch(new CreateTaskCommand(
            $taskForm,
            $this->getUser()
        ), CreateTaskCommand::NAME);

        return $this->json(null, 204);
    }
}