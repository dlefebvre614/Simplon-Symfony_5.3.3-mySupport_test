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
     * ---@Route("/categorypost/{slug}", name="post_view", methods={"GET"}, priority=0)
     * @Route("/categorypost/{id}", name="categorypost_detail", methods={"GET"}, priority=0, requirements={"id"="\d+"})
     */
    public function administratorcategorypost(Categorypost $categorypost): Response
    {
        return $this->render('administrator/categorypost/detail.html.twig', [
            'categorypost' => $categorypost,
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
            $this->addFlash('success', 'Your category has been successfully added!');
            return $this->redirectToRoute('administrator_categorypost');
        }
    
        return $this->render('administrator/categorypost/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/categorypost/update/{id}", name="categorypost_update", priority=2)
     */
    public function administratorcategoryupdate(Categorypost $categorypost, Request $request): Response
    {
        //$categorypost = new Categorypost();
        $form = $this->createForm(CategorypostType::class, $categorypost);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($categorypost);
            $em->flush();
            $this->addFlash('success', 'Your category has been successfully updated!');
            return $this->redirectToRoute('administrator_categorypost');
        }
    
        
        return $this->render('administrator/categorypost/update.html.twig', [
            'form' => $form->createView(),
        ]);
    }

}
