<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\News;

class BlogController extends AbstractController {

    /**
     * @Route("/", name="index")
     */

    public function getNews(): Response {
        $articles = $this->getDoctrine()
                        ->getRepository(News::class)
                        ->findAll();

        // We get the last article by id as an array
        $lastArticle = $this->getDoctrine()->getRepository(News::class)->findBy(array(), array('id' => 'DESC'), 4, 0);

        if(!$articles){
            throw $this->createNotFoundException('No article found');
        }

        return $this->render('index.html.twig', [
           'lastarticle' => $lastArticle
        ]);

    }





}