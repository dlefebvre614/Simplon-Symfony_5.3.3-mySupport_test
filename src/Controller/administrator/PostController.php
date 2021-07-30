<?php

namespace App\Controller\administrator;

use App\Entity\Post;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/administrator", name="administrator_")
 */
class PostController extends AbstractController
{
    /**
     * @Route("/post", name="posts_list")
     */
    public function administratorposts(): Response
    {
        return $this->render('post/index.html.twig', [
            'controller_name' => 'PostController',
        ]);
    }

    /**
    * @Route("/post/{slug}", name="post_detail", methods={"GET"}, priority=0)
    * ---@Route("/post/{id}", name="post_detail", methods={"GET"}, priority=0, requirements={"id"="\d+"})
    */
   public function administratorpost(Post $post): Response
   {
       return $this->render('administrator/post/detail.html.twig', [
           'post' => $post,
       ]);
   }

    /**
     * @Route("/post/add", name="post_add", priority=1)
     */
    public function administratorpostadd(Request $request): Response
    {
        $post = new Post();
        $form = $this->createForm(PostType::class, $post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($post);
            $em->flush();
            $this->addFlash('success', 'Your post has been successfully added!');
            return $this->redirectToRoute('administrator_post');
        }
    
        return $this->render('administrator/post/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/post/update/{id}", name="post_update", priority=2)
     */
    public function administratorupdate(Post $post, Request $request): Response
    {
        //$categorypost = new Categorypost();
        $form = $this->createForm(PostType::class, $post);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($post);
            $em->flush();
            $this->addFlash('success', 'Your post has been successfully updated!');
            return $this->redirectToRoute('administrator_post');
        }
    
        
        return $this->render('administrator/post/update.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}