<?php

namespace App\Repository;

use App\Entity\Henkilo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Henkilo|null find($id, $lockMode = null, $lockVersion = null)
 * @method Henkilo|null findOneBy(array $criteria, array $orderBy = null)
 * @method Henkilo[]    findAll()
 * @method Henkilo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HenkiloRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Henkilo::class);
    }

    // /**
    //  * @return Henkilo[] Returns an array of Henkilo objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Henkilo
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
