<?php


namespace App\Core\Application\Query\Task\GetTasks;


use App\Core\Domain\Model\Users\User;

final class GetTasksQuery
{
    /** @var User */
    private $user;

    public function __construct(
        User $user
    )
    {
        $this->user = $user;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }
}