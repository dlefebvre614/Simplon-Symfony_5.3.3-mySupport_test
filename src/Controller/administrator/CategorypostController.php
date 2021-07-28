<?php

namespace App\Controller\administrator;

use App\Entity\Categorypost;
use App\Form\CategorypostType;
use App\Repository\CategorypostRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/administrator", name="administrator_")
 */
class CategorypostController extends AbstractController
{
    /**
     * @Route("/categorypost", name="categorypost")
     */
    public function administratorcategoryposts(CategorypostRepository $categorypostRepository): Response
    {
        return $this->render('administrator/categorypost/list.html.twig', [
            'categoriespost' => $categorypostRepository->findAll(),
        ]);
    }
    /**
     * @Route("/categorypost/{id}", name="categorypost_detail", priority=0, requirements={"id"="\d+"})
     */
    public function administratorcategorypost(): Response
    {
        return $this->render('administrator/categorypost/detail.html.twig', [
            'controller_name' => 'CategorypostController',
        ]);
    }
    /**
     * @Route("/categorypost/add", name="categorypost_add", priority=1)
     */
    public function administratorcategoryadd(Request $request): Response
    {
        $categorypost = new Categorypost();
        $form = $this->createForm(CategorypostType::class, $categorypost);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($categorypost);
            $em->flush();
            return $this->redirectToRoute('admin_home');
        }
    
        
        return $this->render('administrator/categorypost/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }

}
