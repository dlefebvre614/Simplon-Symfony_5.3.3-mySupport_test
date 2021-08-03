<?php

namespace App\Controller\visitor;

use App\Entity\Post;
use App\Repository\PostRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PostController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function visitorposts(PostRepository $postRepository): Response
    {
        return $this->render('visitor/post/list.html.twig', [
            'posts' => $postRepository->findAll(),
        ]);
    }

    /**
    * @Route("/post/{slug}", name="post_detail", methods={"GET"}, priority=0)
    * ---@Route("/post/{id}", name="post_detail", methods={"GET"}, priority=0, requirements={"id"="\d+"})
    */
   public function visitorpost(Post $post): Response
   {
       return $this->render('visitor/post/detail.html.twig', [
           'post' => $post,
       ]);
   }
}