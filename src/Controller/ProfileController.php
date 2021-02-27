<?php

namespace App\Controller;

use App\Api;
use App\Entity\Comments;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfileController extends AbstractController
{
    /**
     * @param string $username
     * @return Response
     * @Route("/profile/{username}", name="user_profile")
     */
    public function show(string $username): Response
    {
        $user = $this->getDoctrine()->getRepository(User::class)->findOneBy(['username' => $username]);
        $comments = $this->getDoctrine()->getRepository(Comments::class)->findBy(['author' => $username], ['createdAt' => 'DESC'], 3);
        $api = new Api($username);
        $userBadges = $api->getListBadge();
        $userMotto = $api->getMission();
        $userDiamonds = $api->getDiamonds();
        $userWealth = $api->getWealth();

        return $this->render('profile/index.html.twig', [
            'controller_name' => 'ProfileController',
            'user' => $user,
            'userMotto' => $userMotto,
            'userDiamonds' => $userDiamonds,
            'comments' => $comments,
            'userWealth' => $userWealth,
            'userBadges' => $userBadges
            ]);
    }
}
