<?php

namespace App\Repository;

use App\Entity\CIN;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CIN|null find($id, $lockMode = null, $lockVersion = null)
 * @method CIN|null findOneBy(array $criteria, array $orderBy = null)
 * @method CIN[]    findAll()
 * @method CIN[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CINRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CIN::class);
    }

    // /**
    //  * @return CIN[] Returns an array of CIN objects
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
    public function findOneBySomeField($value): ?CIN
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
