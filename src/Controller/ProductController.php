<?php

namespace App\Controller;

use App\Entity\ProductComments;
use App\Entity\ShopProfile;
use App\Form\CommentType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route("/{categorySlug}/{slug}/product", name="product_detail")
     */
    public function index(Request $request,$categorySlug,$slug)
    {
        $em = $this->getDoctrine()->getManager();

        $category = $em->getRepository("App:Categories")->findOneBy(
            array(
               "categorySlug" => $categorySlug
            )
        );

        $product = $em->getRepository("App:Products")->findOneBy(
            array(
                "category" => $category,
                "slug" => $slug
            )
        );

        if(empty($product)){
            throw new NotFoundHttpException("Aradığınız Ürün Bulunamadı...");
        }

        /**
         * @var $shopProfile ShopProfile
         */
        $shopProfile = $product->getShop();

        $comments = $em->getRepository("App:ProductComments")->findByProduct($product);

        $comment = new ProductComments();
        $comment->setProduct($product);

        $commentForm = $this->createForm(CommentType::class,$comment,[]);
        $commentForm->handleRequest($request);

        if($request->isXmlHttpRequest() && $commentForm->isSubmitted() && $commentForm->isValid()){
            var_dump($commentForm->getData());
            die;
        }

        $breadcrumb = array(
            array(
                'link' => $this->generateUrl("category_list",array("slug" => $categorySlug)),
                'title' => $category->getCategoryName()
            ),
            array(
                'link' => $this->generateUrl("product_detail",array("categorySlug" => $categorySlug,"slug" => $slug)),
                'title' => $product->getName()
            )
        );

        return $this->render('product/index.html.twig', [
            'product' => $product,
            'comments' => $comments,
            'shopProfile' => $shopProfile,
            'commentForm' => $commentForm->createView(),
            'breadcrumb' => $breadcrumb
        ]);
    }

    /**
     * @Route("/product-comment-insert", name="product_comment_insert",options={"expose"=true})
     */
    public function productCommentInsert(Request $request)
    {
        if(!$request->isXmlHttpRequest() || $request->getMethod() !== 'GET'){
            return new JsonResponse(
                array(
                    "status" => "error",
                    "message" => "Başarısız İşlem"
                )
            );
        }

        $em = $this->getDoctrine()->getManager();

        $comment = new ProductComments();
        $comment->setIpAddress($_SERVER["REMOTE_ADDR"]);

        if($this->getUser()){
            $comment->setUser($this->getUser()->getEmail());
        }


        $commentForm = $this->createForm(CommentType::class,$comment,array("action" => $this->generateUrl("product_comment_insert")));
        $commentForm->handleRequest($request);

        if($commentForm->isSubmitted() && $commentForm->isValid()){
            $em->persist($comment);
            $em->flush();
        }

    }


}
