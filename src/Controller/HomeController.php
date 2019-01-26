<?php

namespace App\Controller;

use App\Entity\Products;
use App\Library\YandexMap;
use App\Service\JSMin;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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


    /**
     * @Route("/search", name="searchingPage")
     */
    public function search(Request $request,PaginatorInterface $paginator,YandexMap $map)
    {
        $em = $this->getDoctrine()->getManager();

        $products = $em->getRepository("App:Products")->fetchProducts($request);

        $pagination = $paginator->paginate(
            $products,
            $page = $request->query->getInt("page",1),
            $limit = $request->query->getInt("limit",20)
        );


        $placeMarks = [];
        foreach ($products as $product){
            /**
             * @var $product Products
             */
            $placeMarks[] = array(
                'cordinates' => sprintf("%s,%s",$product->getShop()->getLatitude(),$product->getShop()->getLongitude()),
                'title' => 'title',
                'content' => JSMin::minify($this->renderView('map/yandex/mapPopupBlock.html.twig',array(
                    'product' => $product
                ))),
            );
        }

        $variables = array(
            'center' => array(
                'latitude' => isset($_COOKIE['latitude']) ? $_COOKIE['latitude'] : null,
                'longitude' => isset($_COOKIE['longitude']) ? $_COOKIE['longitude']: null
            ),
            'zoom' => 14,
            'placeMarks' => $placeMarks
        );

        $jsMapContent = json_decode($map->generateJsMapFunction($variables),true);



        return $this->render('home/search_new.html.twig', [
            'pagination' => $pagination,
            'jsMapContent' => $jsMapContent['response']
        ]);
    }

    /**
     * @Route("/{slug}/", name="home_static_pages",requirements={"slug"="hakkimizda|iletisim"})
     */
    public function staticPageDetail($slug)
    {
        $em = $this->getDoctrine()->getManager();

        $pageDetail = $em->getRepository("App:StaticPage")->findOneBy(
            [
                'slug' => $slug
            ]
        );

        return $this->render('home/staticPages/aboutus.html.twig', [
            'page_detail' => $pageDetail
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
