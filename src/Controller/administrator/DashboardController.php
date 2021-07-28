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
        return $this->render('administrator/dashboard/index.html.twig', [
            'controller_name' => 'DashboardController',
        ]);
    }
}
