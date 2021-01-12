<?php

namespace App\Repository;

use App\Entity\MesureHomme;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MesureHomme|null find($id, $lockMode = null, $lockVersion = null)
 * @method MesureHomme|null findOneBy(array $criteria, array $orderBy = null)
 * @method MesureHomme[]    findAll()
 * @method MesureHomme[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MesureHommeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MesureHomme::class);
    }

    // /**
    //  * @return MesureHomme[] Returns an array of MesureHomme objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MesureHomme
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
