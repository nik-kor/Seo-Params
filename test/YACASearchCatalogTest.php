<?php
require_once dirname(__FILE__) . '/bootstrap.php';

class YACASearchCatalogTest extends PHPUnit_Framework_TestCase
{
    public function testGoogleInYandexCatalog() 
    {
        $catalogChecker = new CatalogChecker(new YACASearchCatalogStrategy('google.ru'));
        $this->assertTrue($catalogChecker->check());
    } 

    public function testJustRunNotInYandexCatalog() 
    {
        $catalogChecker = new CatalogChecker(new YACASearchCatalogStrategy('justrun.ru'));
        $this->assertFalse($catalogChecker->check());
    }
}
