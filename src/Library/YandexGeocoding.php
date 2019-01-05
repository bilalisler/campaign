<?php
/**
 * Created by PhpStorm.
 * User: bilalisler
 * Date: 10/21/18
 * Time: 11:33 PM
 */

namespace App\Library;

use GuzzleHttp\Client;
use Symfony\Component\HttpFoundation\JsonResponse;
use Twig\Environment;

/**
 * https://tech.yandex.com.tr/maps/doc/geocoder/desc/concepts/input_params-docpage/#input_params__section_v5b_qhh_cfb
 *
 * Class YandexGeocoding
 * @package App\Library
 */
class YandexGeocoding extends AbstractYandexAPI
{
    protected $baseUrl = 'https://geocode-maps.yandex.ru/1.x/';

    protected $options = array(
        'lang' => 'tr_TR',
        'apikey' => 'ee3fc44c-36e2-4b75-846b-383b64801751',
        'format' => 'json',
        'kind' => 'house', //house,street,metro,district,locality
        'geocode' => null, // this value will fill by service. for example: may be address,longitute and latitude desc: Address or geographical coordinates of the object being searched for. The specified data determines the type of geocoding

    );

    /**
     * @param $variables
     * @return false|string
     */
    public function fetchGeocoding($geocodeContent)
    {
        $response = ['status' => 'success','message' => 'OK','result' => []];

        try{
            $client = new Client();

            $resp = $client->request('GET',$this->apiUrl(['geocode' => $geocodeContent]));
            $statusCode = $resp->getStatusCode();

            if($statusCode === 200){
                $response['result'] = json_decode((string)$resp->getBody(),true);
            }

            return json_encode($response);

        }catch (\Exception $e){
            $response['status'] = 'error';
            $response['message'] = $e->getMessage();
            $response['result'] = [];

            return json_encode($response);
        }
    }

    public function getPoint(\stdClass $result){
        try{
            $points = $result->response->GeoObjectCollection->featureMember[0]->GeoObject->Point->pos;

            $points = explode(" ",$points);

            return ['latitude' => $points[1], 'longitude' => $points[0]]; //web service return cordinates in the sequence "longitude latitude"
        }catch (\Exception $e){
            return false;
        }
    }

    public function getAddress(\stdClass $result){
        try{
            return (string)$result->response->GeoObjectCollection->featureMember[0]->GeoObject->metaDataProperty->GeocoderMetaData->text;
        }catch (\Exception $e){
            return false;
        }
    }
}