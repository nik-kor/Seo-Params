<?php
/**
 * YACASearchCatalogStrategy 
 * 
 * @uses SearchCatalogStrategy
 * @uses SearchCatalogInterface
 * @package search_catalog
 * @version $id$
 * @copyright Nikita Korotkih
 * @author Nikita E. Korotkih <nikita.korotkih@gmail.com> 
 * @license MIT license
 */
class YACASearchCatalogStrategy extends SearchCatalogStrategy implements SearchCatalogInterface 
{
  
    public function getPage() 
    {
        if( 'www.' != substr($this->domain, 0, 4) ) { 
            $this->domain = 'www.' . $this->domain;
        }

        return $this->answer = parent::getPage('http://yaca.yandex.ru/yca?text=' . $this->domain . '&yaca=1');
    }

    public function isInCatalog()
    {
        if($this->getCount() > 0) {
            return true;
        }

        return false;
    }

    public function getCount()
    {
        $count = 0;
        if(preg_match('#<div class="z-counter">Найдено по описаниям сайтов — (\d+)</div>#', $this->answer, $matches)) {
            $count = $matches[1];
        }

        return $count;
    }

}

