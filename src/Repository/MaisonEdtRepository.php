<?php

namespace App\Repository;

use App\Entity\MaisonEdt;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MaisonEdt|null find($id, $lockMode = null, $lockVersion = null)
 * @method MaisonEdt|null findOneBy(array $criteria, array $orderBy = null)
 * @method MaisonEdt[]    findAll()
 * @method MaisonEdt[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MaisonEdtRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MaisonEdt::class);
    }

    // /**
    //  * @return MaisonEdt[] Returns an array of MaisonEdt objects
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
    public function findOneBySomeField($value): ?MaisonEdt
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
