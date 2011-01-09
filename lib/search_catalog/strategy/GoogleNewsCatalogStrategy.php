<?php 

/**
 * GoogleNewsCatalogStrategy 
 * 
 * @uses SearchCatalog
 * @uses SearchCatalogInterface
 * @package search_catalog
 * @version $id$
 * @copyright Nikita Korotkih
 * @author Nikita E. Korotkih <nikita.korotkih@gmail.com> 
 * @license MIT license
 */
class GoogleNewsCatalogStrategy extends SearchCatalog implements SearchCatalogInterface 
{
    public function getPage() 
    {
        if( 'www.' == substr($this->domain, 0, 4) ) {
            $this->domain = substr($this->domain, 4);
        }

        return $this->answer = parent::getPage(
                                    'http://news.google.ru/news/search?pz=1&cf=all&ned=ru_ru&hl=ru&q=site:' . 
                                    $this->domain
                                );
    }

    public function isInCatalog()
    {
        if(preg_match('#<div class="results-stats">#i', $this->answer, $matches)) {
            return true;
        } 
        
        return false;
    }

}
