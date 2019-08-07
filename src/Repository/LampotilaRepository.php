<?php

namespace App\Repository;

use App\Entity\Lampotila;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Lampotila|null find($id, $lockMode = null, $lockVersion = null)
 * @method Lampotila|null findOneBy(array $criteria, array $orderBy = null)
 * @method Lampotila[]    findAll()
 * @method Lampotila[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LampotilaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Lampotila::class);
    }

    // /**
    //  * @return Lampotila[] Returns an array of Lampotila objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Lampotila
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
