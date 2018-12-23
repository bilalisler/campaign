<?php

namespace App\Controller;

use App\Entity\ProductComments;
use App\Entity\Products;
use App\Entity\ProductsImages;
use App\Form\CommentType;
use Doctrine\ORM\PersistentCollection;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    /**
     * @Route("/category/{slug}/", name="category_list")
     */
    public function categoryList(Request $request,PaginatorInterface $paginator,$slug)
    {
        $em = $this->getDoctrine()->getManager();

        $category = $em->getRepository("App:Categories")->findOneBy(
            array(
                "categorySlug" => $slug
            )
        );

        if(empty($category)){
            throw new NotFoundHttpException("Aradığınız Kategori Bulunamadı...");
        }

        /**
         * @var $products Products[]
         */
        $products = $category->getProducts();

        if(empty($products)){
            throw new NotFoundHttpException("Aradığınız Kategoride Ürün Bulunamadı...");
        }

        $pagination = $paginator->paginate(
            $products, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            $request->query->getInt('limit', 10)/*limit per page*/
        );

        $allCategories = $em->getRepository("App:Categories")->listAllCategoriesExcludeSlug($slug);

        $allSellers = [];
        foreach ($products as $product){
            if(array_key_exists($product->getShop()->getId(),$allSellers) === false){
                $allSellers[$product->getShop()->getId()] = $product->getShop();
            }
        }

        return $this->render('category/category.html.twig', [
            'pagination' => $pagination,
            'allCategories' => $allCategories,
            'allSellers' => $allSellers
        ]);
    }

}
