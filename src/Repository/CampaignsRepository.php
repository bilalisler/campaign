<?php

namespace App\Repository;


use App\Entity\Campaigns;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Campaigns|null find($id, $lockMode = null, $lockVersion = null)
 * @method Campaigns|null findOneBy(array $criteria, array $orderBy = null)
 * @method Campaigns[]    findAll()
 * @method Campaigns[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CampaignsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Campaigns::class);
    }

//    /**
//     * @return Campaigns[] Returns an array of Campaigns objects
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
    public function findOneBySomeField($value): ?Campaigns
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
