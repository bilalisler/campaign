<?php

namespace App\Controller;

use App\Library\Map\YandexMap;
use App\Service\JSMin;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/map")
 */
class MapController extends AbstractController
{
    /**
     * @Route("/rendered-data", name="map_rendered_data")
     */
    public function mapRenderedData()
    {
        return $this->render('map/index.html.twig', [
            'controller_name' => 'MapController',
        ]);
    }

    /**
     * @Route("/generate", name="map_generate")
     */
    public function mapGenerate(YandexMap $yandexMap)
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
                'latitude' => $_COOKIE['latitude'],
                'longitude' => $_COOKIE['longitude']
            ),
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


}
