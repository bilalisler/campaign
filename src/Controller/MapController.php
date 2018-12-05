<?php

namespace App\Controller;

use App\Library\Map\YandexMap;
use App\Service\JSMin;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/map")
 */
class MapController extends AbstractController
{
    /**
     * @Route("/generate", name="map_generate")
     */
    public function mapGenerate(YandexMap $yandexMap)
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
            'zoom' => 14,
            'placeMarks' => $placeMarks
        );

        $jsMapContent = json_decode($yandexMap->generateJsMapFunction($variables),true);

        $yandexMapTemplate = '';
        if($jsMapContent['status'] === 'success'){
            $yandexJsMapContent = $jsMapContent['response'];
            $yandexMapTemplate = $yandexMap->renderedMapTemplate($yandexJsMapContent);
        }

        return new Response($yandexMapTemplate);
    }

    public function renderedMap(YandexMap $yandexMap){

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

        return $this->render('map/renderedMap.html.twig', [
            'yandexMapJsContent' => $yandexMapJsContent,
        ]);

    }

    public function shopLocationMap(YandexMap $yandexMap){

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

        return $this->render('map/renderedMap.html.twig', [
            'yandexMapJsContent' => $yandexMapJsContent,
        ]);

    }


}
