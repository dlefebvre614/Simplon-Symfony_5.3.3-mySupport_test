<?php

namespace App\Controller\administrator;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/administrator", name="administrator_")
 */
class CategorypostController extends AbstractController
{
    /**
     * @Route("/categorypost", name="categorypost")
     */
    public function index(): Response
    {
        return $this->render('administrator/categorypost/list.html.twig', [
            'controller_name' => 'CategorypostController',
        ]);
    }
}
