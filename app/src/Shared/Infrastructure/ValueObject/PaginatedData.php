<?php


namespace App\Shared\Infrastructure\ValueObject;


final class PaginatedData
{
    /** @var null|array */
    private $data;

    /** @var int */
    private $count;

    public function __construct(
        array $data = null
    )
    {
        $this->data  = $data;
        $this->count = count($data);
    }

    /**
     * @return array|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }

    /**
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
    }
}