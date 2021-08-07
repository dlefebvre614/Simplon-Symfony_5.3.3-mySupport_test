<?php

namespace App\Controller\administrator;

use DateTimeZone;
use App\Entity\Post;
use App\Form\PostType;
use DateTimeImmutable;
use DateTimeInterface;
use App\Repository\PostRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/administrator", name="administrator_")
 */
class PostController extends AbstractController
{
    /**
     * @Route("/posts", name="posts_list")
     */
    public function administratorposts(PostRepository $postRepository): Response
    {
        return $this->render('administrator/post/list.html.twig', [
            'posts' => $postRepository->findAll(),
        ]);
    }

    /**
    * ---@Route("/post/{slug}", name="post_detail", methods={"GET"}, priority=0)
    * @Route("/post/{id}", name="post_detail", methods={"GET"}, priority=0, requirements={"id"="\d+"})
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
        //$dateImmutable = \DateTime::createFromFormat('Y-m-d H:i:s', strtotime('now')); # also tried using \DateTimeImmutable
        $post = new Post();
        $form = $this->createForm(PostType::class, $post);
        $form->handleRequest($request);

        //dd($form);
        //dd($post);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            //dd($post); //Instanciation $post
            $post->setActive(false);
            $post->setHighlighting(false);
            $post->setUser($this->getUser());
            /*$post->setCreatedAt(new \DateTimeImmutable(new DateTimeZone('Europe/Paris'))); DateTimeZone give object (string given!)
            $post->setUpdateAt(new \DateTimeImmutable(new DateTimeZone('Europe/Paris')));*/
            // stay timeZone implementation to have a local time
            $post->setCreatedAt(new \DateTimeImmutable());
            $post->setUpdateAt(new \DateTimeImmutable());
            //dd($post); //Instanciation of $post before persist (full idrated)
            $em->persist($post);
            //dd($post);
            //dd($em);
            $em->flush();
            $this->addFlash('success', 'Your post: ' . $post->getTitle() . ' has been successfully added!');
            return $this->redirectToRoute('administrator_posts_list');
        }
    
        return $this->render('administrator/post/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * ---@Route("/post/update/{slug}", name="post_update", methods={"GET"}, priority=2)
     * @Route("/post/update/{id}", name="post_update", priority=2, requirements={"id"="\d+"})
     */
    public function administratorpostupdate(Post $post, Request $request): Response
    {
        //$post = new post();
        $form = $this->createForm(PostType::class, $post);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $post->setUpdateAt(new DateTimeImmutable());
            $em = $this->getDoctrine()->getManager();
            $em->persist($post);
            $em->flush();
            $this->addFlash('success', 'Your post: ' . $post->getTitle() . ' has been successfully updated!');
            return $this->redirectToRoute('administrator_posts_list');
        }
    
        return $this->render('administrator/post/update.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * ---@Route("/post/activate/{slug}", name="post_activate", methods={"GET"}, priority=3)
     * @Route("/post/activate/{id}", name="post_activate", priority=3, requirements={"id"="\d+"})
     */
    public function administratoractivatepost(Post $post): Response
    {
        // switch true / false method for the button ajax to activate a post
        $post->setActive( ($post->getActive()) ? false : true);
        $em = $this->getDoctrine()->getManager();
        $em->persist($post);
        $em->flush();
        $this->addFlash('success', 'Your post: ' . $post->getTitle() . ' has been successfully validate/invalidate!');
        return new Response("true");
    }

    /**
     * ---@Route("/post/highlighting/{slug}", name="post_highlighting", methods={"GET"}, priority=4)
     * @Route("/post/highlighting/{id}", name="post_highlighting", priority=4, requirements={"id"="\d+"})
     */
    public function administratorhighlightingpost(Post $post): Response
    {
        // switch true / false method for the button ajax to put forward a post
        $post->setHighlighting( ($post->getHighlighting()) ? false : true);
        $em = $this->getDoctrine()->getManager();
        $em->persist($post);
        $em->flush();
        $this->addFlash('success', 'Your post: ' . $post->getTitle() . ' has been successfully highlighting/lowlighting!');
        return new Response("true");
    }
}