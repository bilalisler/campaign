<?php
/**
 * Created by PhpStorm.
 * User: bilalisler
 * Date: 10/21/18
 * Time: 11:33 PM
 */

namespace App\Library\Map;

use Twig\Environment;

class YandexMap extends AbstractMap
{
    protected $baseUrl = 'https://api-maps.yandex.com/2.1/';

    protected $options = array(
        'lang' => 'tr_TR',
        'apikey' => 'ee3fc44c-36e2-4b75-846b-383b64801751',
        'mode' => 'debug',
    );

    protected $twig;

    public function __construct(Environment $twigEngine)
    {
        $this->twig = $twigEngine;
    }

    /**
     * @param $placeMarks
     * @return false|string
     */
    public function generateJsMapFunction($placeMarks)
    {
        try{
            $view = 'map/yandex/yandexMapJsContent.html.twig';

            $variables = array(
                'placeMarks' => $placeMarks
            );

            $mapTemplate = $this->twig->render($view,$variables);

            return json_encode(
                array(
                    'status' => 'success',
                    'response' => $mapTemplate,
                    'message' => 'javascript content was created successfully'
                )
            );
        }catch (\Exception $e){
            return json_encode(
                array(
                    'status' => 'error',
                    'response' => '',
                    'message' => $e->getMessage()
                )
            );
        }
    }
    public function renderedMapTemplate($yandexJsMapContent)
    {
       try{
           $apiUrl = $this->apiUrl();

           $view = 'map/yandex/yandexMapLayout.html.twig';

           $mapTemplate = $this->twig->render($view,array(
               'apiUrl' => $apiUrl,
               'jsMapContent' => $yandexJsMapContent
           ));

           return $mapTemplate;

       }catch (\Exception $e){
        var_dump($e->getMessage());
       }
    }
}