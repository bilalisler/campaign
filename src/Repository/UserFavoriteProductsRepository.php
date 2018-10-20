<?php

namespace App\Repository;


use App\Entity\UserFavoriteProducts;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method UserFavoriteProducts|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserFavoriteProducts|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserFavoriteProducts[]    findAll()
 * @method UserFavoriteProducts[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserFavoriteProductsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, UserFavoriteProducts::class);
    }

//    /**
//     * @return UserFavoriteProducts[] Returns an array of UserFavoriteProducts objects
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
    public function findOneBySomeField($value): ?UserFavoriteProducts
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
