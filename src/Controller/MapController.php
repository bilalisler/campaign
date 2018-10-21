<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
    public function mapGenerate()
    {
        return $this->render('map/yandex/yandex_map_layout.html.twig', [

        ]);
    }


}
