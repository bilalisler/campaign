<?php

namespace App\Controller;

use App\Library\Map\YandexMap;
use App\Service\JSMin;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
        for($i = 0;$i<50;$i++){
            $placeMarks[] = array(
                'cordinates' => sprintf('%s,%s',rand(30,80),rand(30,90)),
                'title' => 'title',
                'content' =>JSMin::minify($this->renderView('map/yandex/mapPopupBlock.html.twig')),
            );
        }

        $variables = array(
            'center' => array(
                'latitude' => isset($_COOKIE['latitude']) ? $_COOKIE['latitude'] : null,
                'longitude' => isset($_COOKIE['longitude']) ? $_COOKIE['longitude']: null
            ),
            'placeMarks' => $placeMarks
        );

        $jsMapContent = json_decode($yandexMap->generateJsMapFunction($variables),true);

        $yandexMapJsContent = '';
        if($jsMapContent['status'] === 'success'){
            $yandexJsMapContent = $jsMapContent['response'];
            $yandexMapJsContent = $yandexMap->renderedMapTemplateOnlyJs($yandexJsMapContent);
        }

        return $this->render('base/base.html.twig', [
            'controller_name' => 'HomeController',
            'yandexMapJsContent' => $yandexMapJsContent,
        ]);
    }
}
