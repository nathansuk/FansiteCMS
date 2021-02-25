<?php


namespace App\Services;


use Doctrine\ORM\EntityManagerInterface;

class UserService
{
    public function __construct(EntityManagerInterface $em) {
        $this->em = $em;
    }

    public function getUserDetails() {


    }

}