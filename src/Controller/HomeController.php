<?php

namespace App\Controller;

use App\Library\Map\YandexMap;
use App\Service\JSMin;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home_page")
     * @Route("/home", name="home")
     */
    public function index(YandexMap $yandexMap)
    {
        return $this->render('home/index.html.twig', [
        ]);
    }

    public function renderCategoryList(){

        $em = $this->getDoctrine()->getManager();

        $categories = $em->getRepository("App:Categories")->listParentCategories(12);

        return $this->render('home/include/categoryBlock.html.twig',array(
            'categories' => $categories
        ));
    }

    public function renderProductList($extractProductId = null){

        $em = $this->getDoctrine()->getManager();

        $qb = $em->getRepository("App:Products")->createQueryBuilder("p");

        if($extractProductId){
            $qb->where($qb->expr()->eq("p.id",":id"))->setParameter("id",$extractProductId);
        }

        $products = $qb->getQuery()->getResult();

        return $this->render('home/include/productListBlock.html.twig',array(
            'products' => $products
        ));
    }
}
