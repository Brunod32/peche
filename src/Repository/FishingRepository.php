<?php

namespace App\Repository;

use App\Entity\Fishing;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Fishing|null find($id, $lockMode = null, $lockVersion = null)
 * @method Fishing|null findOneBy(array $criteria, array $orderBy = null)
 * @method Fishing[]    findAll()
 * @method Fishing[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FishingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Fishing::class);
    }

    // /**
    //  * @return Fishing[] Returns an array of Fishing objects
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
    public function findOneBySomeField($value): ?Fishing
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
