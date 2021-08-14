<?php

namespace App\Core\Application\Command\Files;

use Symfony\Component\HttpFoundation\FileBag;

final class UploadFilesDTO
{
    /** @var FileBag */
    private $file;

    public function __construct(
        FileBag $fileBag
    )
    {
        $this->file = $fileBag;
    }

    /**
     * @return FileBag
     */
    public function getFile(): FileBag
    {
        return $this->file;
    }
}