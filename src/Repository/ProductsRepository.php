<?php

namespace App\Repository;


use App\Entity\Products;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\HttpFoundation\Request;

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

    public function fetchProducts(Request $request){
        $qb = $this->createQueryBuilder("p");

        $cityId = $request->query->get("c",null);
        $townId = $request->query->get("t",null);
        $productString = $request->query->get("p",null);


        if($cityId || $townId){
            $qb->innerJoin("p.shop","s","WITH","s.id = p.shop");
        }

        if($cityId !== null){
            $qb->andWhere(
                $qb->expr()->eq("s.city",":city")
            )
            ->setParameter("city",$cityId)
            ;
        }

        if($townId !== null){
            $qb->andWhere(
                $qb->expr()->eq("s.town",":town")
            )
                ->setParameter("town",$townId)
            ;
        }

        if($productString !== null){
            $qb->andWhere(
                $qb->expr()->like("p.name",":productString")
            )
                ->setParameter("productString",sprintf("%%%s%%",$productString))
            ;
        }

        $qb
            ->andWhere($qb->expr()->eq('p.isSponsored',":isSponsored"))
            ->setParameter("isSponsored",0)
            ->orderBy("p.createdAt","DESC")
        ;

        return $qb->getQuery()->getResult();
    }

    public function listAll($limit = -1,$returnJson = false){
        $qb = $this->createQueryBuilder("p");

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
