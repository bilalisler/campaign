<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route("/product/{slug}", name="product_detail")
     */
    public function index(Request $request,$slug)
    {
        $em = $this->getDoctrine()->getManager();

        $product = $em->getRepository("App:Products")->findOneBy(
            array(
                "slug" => $slug
            )
        );

        if(empty($product)){
            throw new NotFoundHttpException("Aradığınız Ürün Bulunamadı...");
        }

        setlocale(LC_ALL, 'tr_TR.UTF-8');

        return $this->render('product/index.html.twig', [
            'product' => $product,
        ]);
    }
}
