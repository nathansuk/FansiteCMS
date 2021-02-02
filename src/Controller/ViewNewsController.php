<?php

namespace App\Controller;

use App\Entity\News;
use http\Header;
use phpDocumentor\Reflection\Location;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ViewNewsController extends AbstractController
{
    /**
     * @Route("/news/{id}", name="view_news")
     * @param int $id
     * @return Response
     */
    public function show(int $id): Response {

        $article = $this->getDoctrine()->getRepository(News::class)->find($id);

        $list = $this->listOtherNews();
        
        return $this->render('view_news/index.html.twig', [
            'article' => $article,
            'list' => $list
        ]);
    }

    /**
     * @Route("/news", name="list_news")
     */
    public function index(): Response {
        $newsArray = $this->getAllNews();

        return $this->render('view_news/list.html.twig', [
            'newsarray' => $newsArray
            ]);
    }

    public function listOtherNews(): array {
            return $this->getDoctrine()->getRepository(News::class)->findBy(array(), array('id' => 'DESC'), 10, 0);
    }

    public function getAllNews(): array {
        return $this->getDoctrine()->getRepository(News::class)->findAll();
    }

}
