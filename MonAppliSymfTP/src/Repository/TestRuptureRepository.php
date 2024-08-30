<?php

namespace App\Repository;

use App\Entity\TestRupture;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TestRupture|null find($id, $lockMode = null, $lockVersion = null)
 * @method TestRupture|null findOneBy(array $criteria, array $orderBy = null)
 * @method TestRupture[]    findAll()
 * @method TestRupture[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TestRuptureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TestRupture::class);
    }

    // /**
    //  * @return TestRupture[] Returns an array of TestRupture objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TestRupture
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
