<?php

namespace App\Repository;

use App\Entity\ForumPosts;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ForumPosts|null find($id, $lockMode = null, $lockVersion = null)
 * @method ForumPosts|null findOneBy(array $criteria, array $orderBy = null)
 * @method ForumPosts[]    findAll()
 * @method ForumPosts[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ForumPostsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ForumPosts::class);
    }

    // /**
    //  * @return ForumPosts[] Returns an array of ForumPosts objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ForumPosts
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
