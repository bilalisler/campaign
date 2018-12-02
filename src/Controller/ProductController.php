<?php

namespace App\Controller;

use App\Entity\ProductComments;
use App\Form\CommentType;
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

        $comments = $em->getRepository("App:ProductComments")->findByProduct($product);

        return $this->render('product/index.html.twig', [
            'product' => $product,
            'comments' => $comments
        ]);
    }

    /**
     * @Route("/product-comment-insert", name="product_comment_insert",options={"expose"=true})
     */
    public function productCommentInsert(Request $request)
    {
        $comment = new ProductComments();
        $comment->setIpAddress($_SERVER["REMOTE_ADDR"]);

        if($this->getUser()){
            $comment->setUser($this->getUser()->getEmail());
        }

        $commentForm = $this->createForm(CommentType::class,$comment,array("action" => $this->generateUrl("product_comment_insert")));
        $commentForm->handleRequest($request);

        if($request->isXmlHttpRequest() && $commentForm->isSubmitted() && $commentForm->isValid()){
            var_dump($commentForm->getData());
            die;
        }

        return $this->render('comment/commentBlock.html.twig', [
            'commentForm' => $commentForm->createView()
        ]);

    }


}
