<?php

namespace App\Repository;

use App\Entity\CampaignCondition;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CampaignCondition|null find($id, $lockMode = null, $lockVersion = null)
 * @method CampaignCondition|null findOneBy(array $criteria, array $orderBy = null)
 * @method CampaignCondition[]    findAll()
 * @method CampaignCondition[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CampaignConditionRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CampaignCondition::class);
    }

//    /**
//     * @return CampaignCondition[] Returns an array of CampaignCondition objects
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
    public function findOneBySomeField($value): ?CampaignCondition
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
