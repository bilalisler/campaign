<?php
/**
 * Created by PhpStorm.
 * User: bilalisler
 * Date: 10/21/18
 * Time: 11:33 PM
 */

namespace App\Library;

use Twig\Environment;

class YandexMap extends AbstractYandexAPI
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
     * @param $variables
     * @return false|string
     */
    public function generateJsMapFunction($variables)
    {
        try{
            $view = 'map/yandex/yandexMapJsContent.html.twig';

            /**
                array(
                  'center' => array(
                    'latitude' => $_COOKIE['latitude'],
                    'longitude' => $_COOKIE['longitude']
                    ),
                'placeMarks' => array(
                    'cordinates' => '12,12',
                    'title' => 'title',
                    'content' =>'content',
                    )
                 )
             */
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

    public function renderedMapTemplateOnlyJs($yandexJsMapContent)
    {
        try{
            $apiUrl = $this->apiUrl();

            $view = 'map/yandex/yandexMapLayoutOnlyJs.html.twig';

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