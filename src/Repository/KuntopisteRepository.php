<?php

namespace App\Repository;

use App\Entity\Kuntopiste;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Kuntopiste|null find($id, $lockMode = null, $lockVersion = null)
 * @method Kuntopiste|null findOneBy(array $criteria, array $orderBy = null)
 * @method Kuntopiste[]    findAll()
 * @method Kuntopiste[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KuntopisteRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Kuntopiste::class);
    }

    // /**
    //  * @return Kuntopiste[] Returns an array of Kuntopiste objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('k.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Kuntopiste
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
