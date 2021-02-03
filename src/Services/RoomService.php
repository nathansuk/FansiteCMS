<?php


namespace App\Services;

use App\Entity\Room;
use Doctrine\ORM\EntityManagerInterface;

class RoomService
{

    public function __construct(EntityManagerInterface $em) {
        $this->em = $em;
    }

    public function getRoom(int $max): array {
        return $this->em->getRepository(Room::class)->findBy(array(), array('id' => 'DESC'), $max, 0);
    }

    public function getAllRoom(): array {
        return $this->em->getRepository(Room::class)->findAll();
    }

}