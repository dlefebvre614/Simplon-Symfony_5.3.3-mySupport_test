<?php

namespace App\Repository;

use App\Entity\Categorypost;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Categorypost|null find($id, $lockMode = null, $lockVersion = null)
 * @method Categorypost|null findOneBy(array $criteria, array $orderBy = null)
 * @method Categorypost[]    findAll()
 * @method Categorypost[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategorypostRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Categorypost::class);
    }

    // /**
    //  * @return Categorypost[] Returns an array of Categorypost objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Categorypost
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
