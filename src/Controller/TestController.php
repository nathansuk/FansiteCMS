<?php


namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class TestController extends AbstractController{

    /**
     * @Route("/test", name="rien")
     */
    public function sayHello(): Response
    {
        $string = 'hhudhus';
        return $this->render('index.html.twig', [
            'maphrase' => $string
        ]);
    }
}