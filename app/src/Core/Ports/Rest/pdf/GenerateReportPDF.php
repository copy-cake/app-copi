<?php

namespace App\Core\Ports\Rest\pdf;


use App\Core\Domain\Logic\CalculatePayout\SumPayoutTaskOfMonthInterface;
use App\Core\Infrastructure\Repository\Client\MatchClientInterface;
use App\Core\Infrastructure\Repository\Task\TasksOfMonth;
use App\Core\Infrastructure\Service\AggregateDate\SortDayMonth;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api")
 */
class GenerateReportPDF extends AbstractController
{
    /** @var MatchClientInterface */
    private $matchClient;

    /** @var SumPayoutTaskOfMonthInterface  */
    private SumPayoutTaskOfMonthInterface $sumPayoutTaskOfMonth;

    /** @var TasksOfMonth  */
    private TasksOfMonth $tasksOfMonth;

    public function __construct(
        MatchClientInterface $matchClient,
        SumPayoutTaskOfMonthInterface $sumPayoutTaskOfMonth,
        TasksOfMonth $tasksOfMonth
    )
    {
        $this->matchClient = $matchClient;
        $this->sumPayoutTaskOfMonth = $sumPayoutTaskOfMonth;
        $this->tasksOfMonth = $tasksOfMonth;
    }

    /**
     * @Route("/pdf/report/{client}", methods={"GET"})
     */
    public function indexAction(
         $client
    )
    {
        $myClient   = $this->matchClient->foundClient($client);
        $monthTasks = $this->tasksOfMonth->getTasks($client);

        $mpdf = new \Mpdf\Mpdf([
            'orientation' => 'P',
            'format'=>'A4',
            'margin_top'=>'10',
            'margin_left'=>'10',
            'margin_right'=>'10'
        ]);

        $html = $this->render('pdf/report.html.twig',
            [
                'client'       => $myClient,
                'tasks'        => $monthTasks,
                'user'         => $this->getUser(),
                'createAt'     => new \DateTime(),
                'typeGross'    => $myClient->isGross() ? 'Brutto' : 'Netto',
                'lastDayMonth' => SortDayMonth::lastDayOfMonth(),
                'sumPayout'    => $this->sumPayoutTaskOfMonth->sumPayout($client)
            ]);

        $mpdf->WriteHTML($html);
        $mpdf->Output('raport.pdf','D');

        return $this->json(null);
    }
}