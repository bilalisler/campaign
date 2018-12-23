<?php

namespace App\Controller;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Query\Expr\Join;
use EasyCorp\Bundle\EasyAdminBundle\Event\EasyAdminEvents;
use Pagerfanta\Pagerfanta;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AdminController as BaseAdminController;
use Doctrine\ORM\QueryBuilder as DoctrineQueryBuilder;
use Doctrine\ORM\QueryBuilder;



/**
 *
 * Class AdminController
 * @package App\Controller
 */
class AdminController extends BaseAdminController
{
    /**
     * Creates Query Builder instance for all the records.
     *
     * @param string      $entityClass
     * @param string      $sortDirection
     * @param string|null $sortField
     * @param string|null $dqlFilter
     *
     * @return QueryBuilder The Query Builder instance
     */
    protected function createListQueryBuilder($entityClass, $sortDirection, $sortField = null, $dqlFilter = null)
    {
        /* @var EntityManager */
        $em = $this->getDoctrine()->getManagerForClass($entityClass);
        /* @var $queryBuilder DoctrineQueryBuilder */
        $queryBuilder = $em->createQueryBuilder()
            ->select('entity')
            ->from($entityClass, 'entity')
        ;

        /**
         * Override
         */
        $user = $this->getUser();
        if($user !== null and (strpos($entityClass,'Products') !== false || strpos($entityClass,'Messages') !== false)){
            $roles = $user->getRoles();

            if(in_array('ROLE_SUPER_ADMIN',$roles) === false){
                $queryBuilder->innerJoin('entity.shop','s',Join::WITH);
                $queryBuilder->innerJoin('s.user','u',Join::WITH,$queryBuilder->expr()->eq("u.id",$user->getId()));
            }
        }elseif($user !== null and strpos($entityClass,'User') !== false){

        }

        $isSortedByDoctrineAssociation = false !== strpos($sortField, '.');
        if ($isSortedByDoctrineAssociation) {
            $sortFieldParts = explode('.', $sortField);
            $queryBuilder->leftJoin('entity.'.$sortFieldParts[0], $sortFieldParts[0]);
        }

        if (!empty($dqlFilter)) {
            $queryBuilder->andWhere($dqlFilter);
        }

        if (null !== $sortField) {
            $queryBuilder->orderBy(sprintf('%s%s', $isSortedByDoctrineAssociation ? '' : 'entity.', $sortField), $sortDirection);
        }

        return $queryBuilder;
    }
}
