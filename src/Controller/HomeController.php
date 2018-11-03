<?php

namespace App\Controller;

use App\Library\Map\YandexMap;
use App\Service\JSMin;
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
        $placeMarks = [];
        for($i = 0;$i<150;$i++){

            $cord = sprintf('%s,%s',mt_rand(40870000,40880000)/1000000,mt_rand(29200000,29400000)/1000000);

            $placeMarks[] = array(
                'cordinates' => $cord,
                'title' => 'title' . $cord,
                'content' =>JSMin::minify($this->renderView('map/yandex/mapPopupBlock.html.twig')),
            );
        }

        $variables = array(
            'center' => array(
                'latitude' => isset($_COOKIE['latitude']) ? $_COOKIE['latitude'] : null,
                'longitude' => isset($_COOKIE['longitude']) ? $_COOKIE['longitude']: null
            ),
            'zoom' => 15,
            'placeMarks' => $placeMarks
        );

        $mapJsContent = json_decode($yandexMap->generateJsMapFunction($variables),true);

        $yandexMapJsContent = '';
        if($mapJsContent['status'] === 'success'){
            $yandexMapJsContent = $yandexMap->renderedMapTemplateOnlyJs($mapJsContent['response']);
        }

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'yandexMapJsContent' => $yandexMapJsContent,
        ]);
    }
}
