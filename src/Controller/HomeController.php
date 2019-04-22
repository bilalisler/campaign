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
     * @Route("/socket", name="socket")
     */
    public function socket(YandexMap $yandexMap)
    {
        $address = '0.0.0.0';
        $port = 12345;
// Create WebSocket.
        $server = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        socket_set_option($server, SOL_SOCKET, SO_REUSEADDR, 1);
        socket_bind($server, $address, $port);
        socket_listen($server);
        $client = socket_accept($server);
// Send WebSocket handshake headers.
        $request = socket_read($client, 5000);
        preg_match('#Sec-WebSocket-Key: (.*)\r\n#', $request, $matches);
        $key = base64_encode(pack(
            'H*',
            sha1($matches[1] . '258EAFA5-E914-47DA-95CA-C5AB0DC85B11')
        ));
        $headers = "HTTP/1.1 101 Switching Protocols\r\n";
        $headers .= "Upgrade: websocket\r\n";
        $headers .= "Connection: Upgrade\r\n";
        $headers .= "Sec-WebSocket-Version: 13\r\n";
        $headers .= "Sec-WebSocket-Accept: $key\r\n\r\n";
        socket_write($client, $headers, strlen($headers));
// Send messages into WebSocket in a loop.
        while (true) {
            sleep(1);
            $content = 'Now: ' . time();
            $response = chr(129) . chr(strlen($content)) . $content;
            socket_write($client, $response);
        }
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
