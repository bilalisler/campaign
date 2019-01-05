<?php
/**
 * Created by PhpStorm.
 * User: bilalisler
 * Date: 10/21/18
 * Time: 11:17 PM
 */

namespace App\Library;

abstract class AbstractYandexAPI
{
    protected $baseUrl = '';
    protected $options = array();

    /**
     * @return string
     * @throws \Exception
     */
    public function apiUrl($options = []){
        if(!is_array($this->options)){
            throw new \Exception("options variable must be array !!");
        }

        if(!isset($this->baseUrl)){
            throw new \Exception("baseUrl variable mustn't empty !!");
        }

        $options = array_merge($this->options,$options);

        $http_query = http_build_query($options);

        $apiUrl = sprintf('%s?%s',$this->baseUrl,$http_query);

        return $apiUrl;
    }

}