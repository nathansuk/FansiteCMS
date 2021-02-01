<?php

namespace App\Controller;

use App\Entity\Room;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RoomController extends AbstractController
{

    /**
     * @Route("/room", name="room")
     */
    public function index(): Response
    {
        $roomList = $this->getAllRooms();
        return $this->render('room/index.html.twig', [
            'roomlist' => $roomList
        ]);
    }

    public function getAllRooms(): array {
        return $this->getDoctrine()->getRepository(Room::class)->findAll();
    }
}
