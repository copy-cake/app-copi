<?php


namespace App\Core\Ports\Rest\Client;


use App\Core\Application\Command\Client\CreateClient\CreateClientCommand;
use App\Core\Application\Command\Client\DeleteClient\DeleteClientCommand;
use App\Core\Application\Command\Client\UpdateClient\UpdateClientCommand;
use App\Core\Infrastructure\Form\Client\ClientType;
use App\Core\Ports\Rest\CreateRestApi;
use App\Shared\Infrastructure\Http\HttpCode;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api")
 */
class ClientController extends CreateRestApi
{
    /**
     * @Route("/client", methods={"POST"})
     */
    public function createAction(
        Request $request,
        EventDispatcherInterface $eventDispatcher
    )
    {
        $clientForm = $this->buildObject($request, ClientType::class);

        $eventDispatcher->dispatch(new CreateClientCommand(
            $clientForm,
            $this->getUser()
        ), CreateClientCommand::NAME);

        return $this->json(null, HttpCode::NO_CONTET);
    }

    /**
     * @Route("/client/{client}", methods={"PUT"})
     */
    public function updateAction(
        Request $request,
        EventDispatcherInterface $eventDispatcher,
        $client
    )
    {
        $clientForm = $this->buildObject($request, ClientType::class);

        $eventDispatcher->dispatch(new UpdateClientCommand(
           $clientForm,
           $client
        ), UpdateClientCommand::NAME);

        return $this->json(null, HttpCode::NO_CONTET);
    }

    /**
     * @Route("/client/{client}", methods={"DELETE"})
     */
    public function deleteAction(
        $client,
        EventDispatcherInterface $eventDispatcher
    )
    {
        $eventDispatcher->dispatch(new DeleteClientCommand(
            $client), DeleteClientCommand::NAME);

        return $this->json(null, HttpCode::NO_CONTET);
    }

}