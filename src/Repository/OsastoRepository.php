<?php

namespace App\Repository;

use App\Entity\Osasto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Osasto|null find($id, $lockMode = null, $lockVersion = null)
 * @method Osasto|null findOneBy(array $criteria, array $orderBy = null)
 * @method Osasto[]    findAll()
 * @method Osasto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OsastoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Osasto::class);
    }

    // /**
    //  * @return Osasto[] Returns an array of Osasto objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Osasto
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
