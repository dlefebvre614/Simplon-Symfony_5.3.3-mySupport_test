<?php

namespace App\Controller\administrator;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/administrator", name="administrator_")
 */
class DashboardController extends AbstractController
{
    /**
     * @Route("/dashboard", name="dashboard")
     */
    public function administratordashboard(): Response
    {
        // values for Days chart
        $month = [
            $month[0] = array("2021-03", "2021-04", "2021-05", "2021-06", "2021-07", "2021-08", "2021-09"),
            $month[1] = array(100, 200, 300, 400, 500, 600, 700),
        ];

        $maxByMonth = 700;

        // values for Months chart
        $day = [
            $day[0] = array("2021-08-21", "2021-08-21", "2021-08-22", "2021-08-23", "2021-08-24", "2021-08-25", "2021-08-26", "2021-08-27", "2021-08-28", "2021-08-29", "2021-08-30", "2021-08-31", "2021-09-01"),
            $day[1] = array(10, 70, 40, 30, 60, 160, 150, 140, 90, 30, 110, 120, 130),
        ];

        $maxByDay = 160;

        return $this->render('administrator/dashboard/index.html.twig', [
            'day' => $day,
            'month' => $month,
            'maxByDay' => $maxByDay,
            'maxByMonth' => $maxByMonth,
        ]);
    }
}
