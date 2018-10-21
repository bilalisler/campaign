<?php
/**
 * Created by PhpStorm.
 * User: bilalisler
 * Date: 10/21/18
 * Time: 11:17 PM
 */

namespace App\Library\Map;

abstract class AbstractMap
{
    protected $baseUrl = '';
    protected $options = array();

    /**
     * @return string
     * @throws \Exception
     */
    public function apiUrl(){
        if(count($this->options) === 0){
            throw new \Exception("Map's options mustn't empty !!!");
        }

        if(!is_array($this->options)){
            throw new \Exception("options variable must be array !!");
        }

        if(!isset($this->baseUrl)){
            throw new \Exception("baseUrl variable mustn't empty !!");
        }

        $http_query = http_build_query($this->options);

        $apiUrl = sprintf('%s?%s',$this->baseUrl,$http_query);

        return $apiUrl;
    }

    abstract public function generateJsMapFunction($placeMarks);

    abstract public function renderedMapTemplate($yandexMapJsContent);
}