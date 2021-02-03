<?php

namespace App\Controller;

use App\Entity\News;
use App\Services\NewsService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ViewNewsController extends AbstractController
{
    /**
     * @Route("/news/{id}", name="view_news")
     * @param int $id
     * @param NewsService $newsService
     * @return Response
     */
    public function show(int $id, NewsService $newsService): Response {

        $article = $this->getDoctrine()->getRepository(News::class)->find($id);

        $list = $newsService->getNews(10);
        
        return $this->render('view_news/index.html.twig', [
            'article' => $article,
            'list' => $list
        ]);
    }

    /**
     * @Route("/news", name="list_news")
     * @param NewsService $newsService
     * @return Response
     */
    public function index(NewsService $newsService): Response {
        $newsArray = $newsService->getAllNews();
        return $this->render('view_news/list.html.twig', [
            'newsarray' => $newsArray
            ]);
    }

}
