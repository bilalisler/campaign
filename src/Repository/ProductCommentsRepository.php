<?php

namespace App\Repository;

use App\Entity\ProductComments;
use App\Entity\Products;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ProductComments|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProductComments|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProductComments[]    findAll()
 * @method ProductComments[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductCommentsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ProductComments::class);
    }

    /**
     * @return ProductComments[] Returns an array of ProductComments objects
     */
    public function findByProduct(Products $products)
    {
        return $this
            ->createQueryBuilder('p')
            ->where("p.parent is null")
            ->andWhere('p.product = :product')
            ->setParameter('product', $products)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    /*
    public function findOneBySomeField($value): ?ProductComments
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
