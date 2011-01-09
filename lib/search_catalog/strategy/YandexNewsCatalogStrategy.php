<?php

/**
 * YandexNewsCatalogStrategy 
 * 
 * @uses SearchCatalogStrategy
 * @uses SearchCatalogInterface
 * @package search_catalog
 * @version $id$
 * @copyright Nikita Korotkih
 * @author Nikita E. Korotkih <nikita.korotkih@gmail.com> 
 * @license MIT license
 */
class YandexNewsCatalogStrategy extends SearchCatalogStrategy implements SearchCatalogInterface 
{
    public function getPage()
    {
        if( 'www.' == substr($this->domain, 0, 4) ) {
            $this->domain = substr($this->domain, 4);
        }

        return $this->answer = parent::getPage(
                                        'http://news.yandex.ru/yandsearch?text=' . 
                                        $this->domain . 
                                        '&rptval=on&rpt=smisearch&grhow=clutop'
                                );
    }

    public function isInCatalog() 
    {
        if($this->getCount() > 0 && $this->isDomainInResultList()) {
            return true;
        }

        return false;
    }

    public function getCount() 
    {
        $count = 0;
        if(preg_match('#<dl class="total">\s*<strong>Результат поиска:</strong>\s*<dd>\s*агентств &\#8212; (\d)+#', $this->answer, $matches)) {
            $count = $matches[1];
        } 
    
        return $count;
    }

    public function isDomainInResultList() 
    {
        if(preg_match('#<dd class="info">\s*<a class="url" href="http://w*\.?' . $this->domain . '/"#', $this->answer, $matches)) {
            return true;
        }

        return false;
    }
}
