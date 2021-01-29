<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\News;
use App\Entity\Room;
use App\Entity\StaffStream;

class BlogController extends AbstractController {

    /**
     * @Route("/", name="home")
     */
    public function home(): Response {

        $lastRoom = $this->getRoom();
        $lastNews = $this->getNews();
        $staffStream = $this->getStaffStream();

        return $this->render('index.html.twig', [
            'lastroom' => $lastRoom,
            'lastarticle' => $lastNews,
            'staffStream' => $staffStream
        ]);
    }

    public function getNews(): array {
        return $this->getDoctrine()->getRepository(News::class)->findBy(array(), array('id' => 'DESC'), 4, 0);
    }

    public function getRoom(): array {
        return $this->getDoctrine()->getRepository(Room::class)->findBy(array(), array('id' => 'DESC'), 3, 0);
    }

    public function getStaffStream(): array {
        return $this->getDoctrine()->getRepository(StaffStream::class)->findBy(array(), array('id' => 'DESC'), 5, 0);
    }





}