<?php


namespace App\Services;


use App\Entity\ForumPosts;
use Doctrine\ORM\EntityManagerInterface;

class ForumPostsService
{

    public function __construct(EntityManagerInterface $em) {
        $this->em = $em;
    }

    public function getForumPosts(int $max): array {
        return $this->em->getRepository(ForumPosts::class)->findBy(array(), array('id' => 'DESC'), $max, 0);
    }

}