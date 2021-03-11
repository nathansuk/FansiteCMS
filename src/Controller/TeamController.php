<?php

namespace App\Controller;

use App\Services\RankService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TeamController extends AbstractController
{
    /**
     * @param RankService $rankService
     * @return Response
     * @Route("/staff", name="team")
     */
    public function index(RankService $rankService): Response
    {

        $ranks = $rankService->getRank();

        return $this->render('team/index.html.twig', [
            'controller_name' => 'TeamController',
            'ranks' => $ranks
        ]);
    }
}
