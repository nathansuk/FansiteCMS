<?php

namespace App\Repository;

use App\Entity\StaffStream;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method StaffStream|null find($id, $lockMode = null, $lockVersion = null)
 * @method StaffStream|null findOneBy(array $criteria, array $orderBy = null)
 * @method StaffStream[]    findAll()
 * @method StaffStream[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StaffStreamRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StaffStream::class);
    }

    // /**
    //  * @return StaffStream[] Returns an array of StaffStream objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?StaffStream
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
