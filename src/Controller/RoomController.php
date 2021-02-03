<?php

namespace App\Controller;

use App\Entity\Room;
use App\Services\RoomService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RoomController extends AbstractController
{

    /**
     * @Route("/room", name="room")
     * @param RoomService $roomService
     * @return Response
     */
    public function index(RoomService $roomService): Response
    {
        $roomList = $roomService->getAllRoom();
        return $this->render('room/index.html.twig', [
            'roomlist' => $roomList
        ]);
    }
}
