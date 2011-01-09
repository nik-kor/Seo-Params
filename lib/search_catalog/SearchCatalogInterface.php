<?php
/**
 * SearchCatalogInterface 
 * 
 * @package search_catalog
 * @version $id$
 * @copyright Nikita Korotkih
 * @author Nikita E. Korotkih <nikita.korotkih@gmail.com> 
 * @license MIT license
 */
interface SearchCatalogInterface 
{
    public function getPage();
    public function isInCatalog();
}
