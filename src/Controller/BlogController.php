<?php

namespace App\Controller;

use App\Services\RoomService;
use App\Services\StaffStreamService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Services\NewsService;
use App\Entity\News;
use App\Entity\Room;
use App\Entity\StaffStream;

class BlogController extends AbstractController {

    /**
     * @Route("/", name="home")
     * @param NewsService $newsService
     * @param RoomService $roomService
     * @param StaffStreamService $staffStreamService
     * @return Response
     */
    public function home(NewsService $newsService, RoomService $roomService, StaffStreamService $staffStreamService): Response {

        $lastRoom = $roomService->getRoom(3);
        $lastNews = $newsService->getNews(4);
        $staffStream = $staffStreamService->getStaffStream(5);

        return $this->render('index.html.twig', [
            'lastroom' => $lastRoom,
            'lastarticle' => $lastNews,
            'staffStream' => $staffStream
        ]);
    }
}