<?php

namespace App\Controller\administrator;

use DateTimeZone;
use App\Entity\User;
use App\Form\PostType;
use DateTimeImmutable;
use DateTimeInterface;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/administrator", name="administrator_")
 */
class UserController extends AbstractController
{
    /**
     * @Route("/users", name="users_list")
     */
    public function administratorusers(UserRepository $userRepository): Response
    {
        return $this->render('administrator/user/list.html.twig', [
            'users' => $userRepository->findAll(),
        ]);
    }

    /**
    * ---@Route("/user/{slug}", name="user_detail", methods={"GET"}, priority=0)
    * @Route("/user/{id}", name="user_detail", methods={"GET"}, priority=0, requirements={"id"="\d+"})
    */
   public function administratoruser(User $user): Response
   {
       return $this->render('administrator/user/detail.html.twig', [
           'user' => $user,
       ]);
   }

    /**
     * @Route("/user/add", name="user_add", priority=1)
     */
    //public function administratoruseradd(Request $request): Response
    //{
        //$dateImmutable = \DateTime::createFromFormat('Y-m-d H:i:s', strtotime('now')); # also tried using \DateTimeImmutable
        //$user = new User();
        //$form = $this->createForm(PostType::class, $user);
        //$form->handleRequest($request);

        //dd($form);
        //dd($user);
        
        //if ($form->isSubmitted() && $form->isValid()) {
            //$em = $this->getDoctrine()->getManager();
            //dd($user); //Instanciation $user
            //$user->setActive(false);
            //$user->setHighlighting(false);
            //$user->setUser($this->getUser());
            /*$user->setCreatedAt(new \DateTimeImmutable(new DateTimeZone('Europe/Paris'))); DateTimeZone give object (string given!)
            $user->setUpdateAt(new \DateTimeImmutable(new DateTimeZone('Europe/Paris')));*/
            // stay timeZone implementation to have a local time
            //$user->setCreatedAt(new \DateTimeImmutable());
            //$user->setUpdateAt(new \DateTimeImmutable());
            //dd($user); //Instanciation of $post before persist (full idrated)
            //$em->persist($user);
            //dd($user);
            //dd($em);
            //$em->flush();
            //$this->addFlash('success', 'Your user: ' . $user->getemail() . ' has been successfully added!');
            //return $this->redirectToRoute('administrator_users_list');
        //}
    
        // return $this->render('administrator/user/add.html.twig', [
            //'form' => $form->createView(),
        //]);
    //}

    /**
     * ---@Route("/user/update/{slug}", name="user_update", methods={"GET"}, priority=2)
     * @Route("/user/update/{id}", name="user_update", priority=2, requirements={"id"="\d+"})
     */
    public function administratoruserupdate(User $user, Request $request): Response
    {
        //$user = new user();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            //$user->setUpdateAt(new DateTimeImmutable());
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            $this->addFlash('success', 'Your user: ' . $user->getEmail() . ' has been successfully updated!');
            return $this->redirectToRoute('administrator_users_list');
        }
    
        return $this->render('administrator/user/update.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * ---@Route("/user/activate/{slug}", name="user_activate", methods={"GET"}, priority=3)
     * @Route("/user/activate/{id}", name="user_activate", priority=3, requirements={"id"="\d+"})
     */
    public function administratoractivateuser(User $user): Response
    {
        // switch true / false method for the button ajax to activate a post
        $user->setIsVerified( ($user->isVerified()) ? false : true);
        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();
        $this->addFlash('success', 'Your user: ' . $user->getEmail() . ' has been successfully validate/invalidate!');
        return new Response("true");
    }
}