<?php

namespace App\Repository;


use App\Entity\ShopProfile;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ShopProfile|null find($id, $lockMode = null, $lockVersion = null)
 * @method ShopProfile|null findOneBy(array $criteria, array $orderBy = null)
 * @method ShopProfile[]    findAll()
 * @method ShopProfile[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ShopProfileRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ShopProfile::class);
    }

//    /**
//     * @return ShopProfile[] Returns an array of ShopProfile objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ShopProfile
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
