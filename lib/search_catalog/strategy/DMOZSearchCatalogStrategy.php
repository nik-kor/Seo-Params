<?php
/**
 * DMOZSearchCatalogStrategy 
 * 
 * @uses SearchCatalogStrategy
 * @uses SearchCatalogInterface
 * @package search_catalog
 * @version $id$
 * @copyright Nikita Korotkih
 * @author Nikita E. Korotkih <nikita.korotkih@gmail.com> 
 * @license MIT license
 */
class DMOZSearchCatalogStrategy extends SearchCatalogStrategy implements SearchCatalogInterface 
{

    public function getPage() 
    {
        if( 'www.' != substr($this->domain, 0, 4) ) {
            $this->domain = 'www.' . $this->domain;
        }

        return $this->answer = parent::getPage('http://search.dmoz.org/cgi-bin/search?search=' . $this->domain);
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
        if( preg_match('#<strong>Open Directory Sites</strong>\s*<small>\(\d+\-\d+ of (\d+)\)#i' , $this->answer, $matches) ) {
            $count = $matches[1];
        }

        return $count;
    }

}

