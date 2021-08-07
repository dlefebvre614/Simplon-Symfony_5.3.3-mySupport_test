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
        $monthsDataAdministrator = [
            $monthsDataAdministrator[0] = array("March 2021", "March 2021", "April 2021", "May 2021", "June 2021", "July 2021", "August 2021"),
            $monthsdataAdministrator[1] = array(10, 20, 30, 40, 50, 60, 70),
        ];

        // $daysdata = array("foo", "bar", "hello", "world");

        $daysDataAdministrator = [
            $daysDataAdministrator[0] = array("August, 21, 2021", "August, 26, 2021", "August, 22, 2021", "August, 23, 2021", "August, 24, 2021", "August, 25, 2021", "August, 26, 2021", "August, 27, 2021", "August, 28, 2021", "August, 29, 2021", "August, 30, 2021", "August, 31, 2021", "September, 01, 2021"),
            $daysDataAdministrator[1] = array(1, 7, 4, 3, 6, 16, 15, 14, 9, 3, 11, 12, 13),
        ];

        $monthsdata = [
            
        ];

        return $this->render('administrator/dashboard/index.html.twig', [
            'controller_name' => 'DashboardController',
        ]);
    }
}
