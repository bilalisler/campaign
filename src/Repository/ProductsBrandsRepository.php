<?php

namespace App\Repository;


use App\Entity\ProductsBrands;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ProductsBrands|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProductsBrands|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProductsBrands[]    findAll()
 * @method ProductsBrands[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductsBrandsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ProductsBrands::class);
    }

//    /**
//     * @return ProductsBrands[] Returns an array of ProductsBrands objects
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
    public function findOneBySomeField($value): ?ProductsBrands
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
