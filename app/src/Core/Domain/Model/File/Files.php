<?php


namespace App\Core\Domain\Model\File;


use App\Core\Domain\Model\File\GS\FilesGS;
use App\Core\Domain\Model\Task\Task;
use App\Core\Domain\Model\Users\User;

class Files
{
    use FilesGS;

    /** @var string */
    private $id;

    /** @var string */
    private $nameFiles;

    /** @var string */
    private $pathFile;

    /** @var string */
    private $typeExt;

    /** @var \DateTime */
    private $createdAt;

    /** @var User */
    private $users;

    /** @var Task */
    private $task;

    public function __construct()
    {
        $this->id        = uuid_create();
        $this->createdAt = new \DateTime();
    }


}
