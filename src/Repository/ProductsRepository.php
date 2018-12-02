<?php

namespace App\Repository;


use App\Entity\Products;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Products|null find($id, $lockMode = null, $lockVersion = null)
 * @method Products|null findOneBy(array $criteria, array $orderBy = null)
 * @method Products[]    findAll()
 * @method Products[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Products::class);
    }


    public function listAll($limit = -1,$returnJson = false){
        $em = $this->getEntityManager();
        $qb = $em->getRepository("App:Products")->createQueryBuilder("p");

        $qb
            ->where($qb->expr()->eq('p.isActive',":isActive"))
            ->setParameter("isActive",1)
            ->andWhere($qb->expr()->eq('p.isDelete',":isDelete"))
            ->setParameter("isDelete",0)
            ->andWhere($qb->expr()->eq('p.isSponsored',":isSponsored"))
            ->setParameter("isSponsored",0)
            ->orderBy("p.createdAt","DESC")
        ;

        $limit = intval($limit);
        if($limit > -1){
            $qb->setMaxResults($limit);
        }

        if($returnJson === true){
            return json_encode($qb->getQuery()->getArrayResult());
        }
        return $qb->getQuery()->getResult();
    }

//    /**
//     * @return Products[] Returns an array of Products objects
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
    public function findOneBySomeField($value): ?Products
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
