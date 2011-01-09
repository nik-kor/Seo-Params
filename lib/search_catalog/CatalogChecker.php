<?php
/**
 * CatalogChecker 
 * 
 * @package search_catalog
 * @version $id$
 * @copyright Nikita Korotkih
 * @author Nikita E. Korotkih <nikita.korotkih@gmail.com> 
 * @license MIT license
 */
class CatalogChecker 
{
    private $itsCatalog;

    public function __construct(SearchCatalogInterface $catalog) 
    {
        $this->itsCatalog = $catalog;
    }
    
    public function setCatalog(SearchCatalogInterface $catalog) 
    {
      $this->itsCatalog = $catalog;
    }

    public function check() 
    {
        if($this->itsCatalog->getPage()) {
            return $this->itsCatalog->isInCatalog();
        }

        return false;
    }

    public function __toString() 
    {
        return 'CatalogChecker';
    }
}


