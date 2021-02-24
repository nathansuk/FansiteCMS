<?php

namespace App\Controller;

use App\Entity\Comments;
use App\Entity\News;
use App\Form\CommentsType;
use App\Services\NewsService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ViewNewsController extends AbstractController
{
    /**
     * @Route("/news/{id}", name="view_news")
     * @param int $id
     * @param NewsService $newsService
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function show(int $id, NewsService $newsService, Request $request, EntityManagerInterface $entityManager): Response {

        $article = $this->getDoctrine()->getRepository(News::class)->find($id);
        $comments_list = $this->getDoctrine()->getRepository(Comments::class)->findBy(['articleId' => $id], ['createdAt' => 'ASC']);
        $comment = new Comments();
        $comment_form = $this->createForm(CommentsType::class, $comment, array(
            'antispam_time'     => true,
            'antispam_time_min' => 10,
            'antispam_time_max' => 60,
        ));
        $comment_form->handleRequest($request);

        if($comment_form->isSubmitted() && $comment_form->isValid()){

            $comment->setAuthor($this->getUser()->getUsername())
                ->setCreatedAt(new \DateTime("now"))
                ->setArticleId($article);

            $entityManager->persist($comment);
            $entityManager->flush();

            $this->addFlash('success', 'Message enregistré');

            $this->redirectToRoute('view_news', ['id' => $id]);

        }


        $list = $newsService->getNews(10);
        
        return $this->render('view_news/index.html.twig', [
            'article' => $article,
            'list' => $list,
            'comments' => $comments_list,
            'comment_form' => $comment_form->createView()
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
