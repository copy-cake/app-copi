<?php


namespace App\Core\Ports\Rest\Client;


use App\Core\Application\Query\Client\GetClients\GetClientsQuery;
use App\Core\Ports\Rest\QueryApi;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api")
 */
class GetClients extends QueryApi
{

    /**
     * @Route("/client", methods={"GET"})
     */
    public function indexAction()
    {
        $getClients = new GetClientsQuery($this->getUser());

        return $this->serializeQueryObject($getClients);
    }
}