<?php


namespace App\Core\Domain\Model\Task;


use App\Core\Application\Command\Task\CreateTaskDTO;
use App\Core\Domain\Model\Client\Client;
use App\Core\Domain\Model\File\Files;
use App\Core\Domain\Model\Task\GS\TaskGS;
use App\Core\Domain\Model\TypeText\TypeText;
use App\Core\Domain\Model\Users\User;
use App\Core\Domain\Model\Wallet\WalletControl;

class Task
{
    use TaskGS;

    /** @var string */
    private $id;

    /** @var string */
    private $titleTask;

    /** @var TaskDate */
    private $taskDate;

    /** @var Client */
    private $client;

    /** @var boolean */
    private $status;

    /** @var null|TypeText */
    private $typeText;

    /** @var int */ /*zzs on 1000*/
    private $numberCountCharacter;

    /** @var User */
    private $users;

    /** @var Files */
    private $files;

    /** @var WalletControl */
    private $walletControl; // todo here we will start event sourcing

    public function __construct(
        CreateTaskDTO $createTaskDTO,
        User $user
    )
    {
        $this->id                   = uuid_create();
        $this->status               = false;
        $this->taskDate             = new TaskDate();
        $this->titleTask            = $createTaskDTO->getTitleTask();
        $this->client               = $createTaskDTO->getClient();
        $this->numberCountCharacter = $createTaskDTO->getNumberCountCharacter();
        $this->walletControl        = new WalletControl($user);
    }

    public function createWalletControl(
        User $user,
        float $payoutMoney
    )
    {
        $this->users         = $user;
        $this->walletControl = new WalletControl($user, $payoutMoney);
    }

    /**
     * @return WalletControl
     */
    public function getWalletControl(): WalletControl
    {
        return $this->walletControl;
    }


}
