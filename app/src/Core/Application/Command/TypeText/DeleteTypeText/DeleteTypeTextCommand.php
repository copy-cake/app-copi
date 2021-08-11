<?php


namespace App\Core\Application\Command\TypeText\DeleteTypeText;


use App\Core\Domain\Model\TypeText\TypeText;

final class DeleteTypeTextCommand
{
    public const NAME = 'delete.text';

    /** @var string */
    private $typeText;

    public function __construct(
        string $typeText
    )
    {
        $this->typeText = $typeText;
    }

    /**
     * @return string
     */
    public function getTypeText(): string
    {
        return $this->typeText;
    }

}