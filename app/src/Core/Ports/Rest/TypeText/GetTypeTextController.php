<?php


namespace App\Core\Ports\Rest\TypeText;


use App\Core\Application\Query\TypeText\GetTypeText\TypeTextQuery;
use App\Core\Ports\Rest\QueryApi;
use Symfony\Component\Routing\Annotation\Route;

class GetTypeTextController extends QueryApi
{

    /**
     * @Route("/api/typeText", methods={"GET"})
     */
    public function indexAction()
    {
        $typeText = new TypeTextQuery($this->getUser());

        return $this->serializeQueryObject($typeText);
    }

}