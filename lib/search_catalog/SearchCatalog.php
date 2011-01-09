<?php
/**
 * SearchCatalog 
 * 
 * @abstract
 * @package search_catalog
 * @copyright Nikita Korotkih
 * @author Nikita E. Korotkih <nikita.korotkih@gmail.com>
 * @license MIT license
*/
abstract class SearchCatalog 
{
    protected $domain, $answer;

    public function __construct($domain)
    {
        $this->domain = $domain;
    }

    protected function getPage($page)
    {
        $ret = '';
        if( $curl = curl_init() ) {
            curl_setopt($curl,CURLOPT_URL,$page);
            curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
            curl_setopt($curl,CURLOPT_CONNECTTIMEOUT,60);
            curl_setopt($curl,CURLOPT_HEADER,false);
            curl_setopt($curl,CURLOPT_ENCODING,"gzip,deflate");
            curl_setopt($curl,CURLOPT_FOLLOWLOCATION, true);
            
            $ret = curl_exec($curl);

            curl_close($curl);
        }
        
        return $ret;
    }

}
