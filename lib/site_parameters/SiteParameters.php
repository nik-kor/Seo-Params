<?php
require_once dirname(__FILE__) . '/pagerank.php';

/**
 * SiteParameters
 * 
 * @package site_parameters
 * @version $id$
 * @copyright Nikita Korotkih
 * @author Nikita E. Korotkih <nikita.korotkih@gmail.com> 
 * @license MIT license
 */
class SiteParameters
{
    public static function getPr($url) {
        if (!preg_match('/^(http:\/\/)([^\/]+)/i', $url)) { 
            $url='http://' . $url; 
        }

        return getpr($url);
    }

    public static function getTcy($url) 
    { 
        if (!preg_match("/^(http:\/\/)([^\/]+)/i", $url)) { 
            $url='http://'.$url; 
        }
        $xml = file_get_contents('http://bar-navig.yandex.ru/u?ver=2&show=32&url='.$url); 
        
        return $xml ? (int) substr(strstr($xml, 'value="'), 7) : false; 
    } 
   
}





