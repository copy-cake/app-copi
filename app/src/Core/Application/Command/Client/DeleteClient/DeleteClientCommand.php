<?php


namespace App\Core\Application\Command\Client\DeleteClient;


final class DeleteClientCommand
{
    public const NAME = 'delete.client';

    /** @var string */
    private $clientId;

    public function __construct(
        string $clientId
    )
    {
        $this->clientId = $clientId;
    }

    /**
     * @return string
     */
    public function getClientId(): string
    {
        return $this->clientId;
    }
}