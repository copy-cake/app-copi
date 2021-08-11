<?php


namespace App\Core\Application\Query\TypeText;


use App\Core\Domain\Model\TypeText\TypeText;

final class TypeTextDTO
{
    /** @var string */
    private $id;

    /** @var string */
    private $destination;

    /** @var string */
    private $createdAt;

    public static function fromEntity(TypeText $typeText): TypeTextDTO
    {
        $dto = new static();

        $dto->id          = $typeText->getId();
        $dto->destination = $typeText->getDestination();
        $dto->createdAt   = $typeText->getCreatedAt()->format('Y-m-d H:i');

        return $dto;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getDestination(): string
    {
        return $this->destination;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

}