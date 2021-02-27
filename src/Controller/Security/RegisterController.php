<?php

namespace App\Controller\Security;

use App\Entity\User;
use App\Form\RegistrationType;
use App\Security\LoginAuthenticator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;

class RegisterController extends AbstractController
{

    /**
     * @Route("/register", name="register")
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @param LoginAuthenticator $loginAuthenticator
     * @param GuardAuthenticatorHandler $guardAuthenticatorHandler
     * @return Response
     */
    public function registration(Request $request, EntityManagerInterface $entityManager, UserPasswordEncoderInterface $passwordEncoder, LoginAuthenticator $loginAuthenticator, GuardAuthenticatorHandler $guardAuthenticatorHandler): Response
    {

        if ($this->getUser()) {
            return $this->redirectToRoute('home');
        }

        $user = new User();
        $register_form = $this->createForm(RegistrationType::class, $user);
        $register_form->handleRequest($request);

        if($register_form->isSubmitted() && $register_form->isValid()) {

            $hash = $passwordEncoder->encodePassword($user, $user->getPassword());
            $user->setPassword($hash)
                ->setCreatedAt(new \DateTime("now"))
                ->setPoints(0)
                ->setRoles(['ROLE_USER'])
                ->setVerified(false);

            $entityManager->persist($user);
            $entityManager->flush();

             $guardAuthenticatorHandler->authenticateUserAndHandleSuccess($user, $request, $loginAuthenticator, 'main');
             return $this->redirectToRoute('home');
        }


        return $this->render('register/index.html.twig', [
            'register_form' => $register_form->createView()
        ]);
    }
}
