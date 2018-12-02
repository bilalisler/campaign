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
            'controller_name' => 'HomeController'
        ]);
    }

    public function renderCategoryList(){

        $em = $this->getDoctrine()->getManager();

        $categories = $em->getRepository("App:Categories")->listParentCategories(12);

        return $this->render('home/include/categoryBlock.html.twig',array(
            'categories' => $categories
        ));
    }

    public function renderProductList(){

        $em = $this->getDoctrine()->getManager();

        $products = $em->getRepository("App:Products")->listAll(10);

        return $this->render('home/include/productListBlock.html.twig',array(
            'products' => $products
        ));
    }
}
