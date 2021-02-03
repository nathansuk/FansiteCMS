<?php


namespace App\Services;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\News;

class NewsService
{

    public function __construct(EntityManagerInterface $em) {
        $this->em = $em;
    }

    public function getNews(int $max): array {
        return $this->em->getRepository(News::class)->findBy(array(), array('id' => 'DESC'), $max, 0);
    }

    public function getAllNews(): array{
        return $this->em->getRepository(News::class)->findAll();
    }

}