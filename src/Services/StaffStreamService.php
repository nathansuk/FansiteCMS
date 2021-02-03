<?php


namespace App\Services;

use App\Entity\StaffStream;
use Doctrine\ORM\EntityManagerInterface;

class StaffStreamService
{
    public function __construct(EntityManagerInterface $em) {
        $this->em = $em;
    }

    public function getStaffStream(int $max): array {
        return $this->em->getRepository(StaffStream::class)->findBy(array(), array('id' => 'DESC'), $max, 0);
    }
}