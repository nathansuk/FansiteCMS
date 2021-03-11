<?php


namespace App\Services;


use App\Entity\Rank;
use Doctrine\ORM\EntityManagerInterface;

class RankService
{

    public function __construct(EntityManagerInterface $em) {
        $this->em = $em;
    }

    public function getRank(): array {
        return $this->em->getRepository(Rank::class)->findAll();
    }

}