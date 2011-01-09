<?php
require_once dirname(__FILE__) . '/bootstrap.php';

class DMOZSearchCatalogTest extends PHPUnit_Framework_TestCase
{
    public function testMailRuInCatalog() 
    {
        $catalogChecker = new CatalogChecker(new DMOZSearchCatalogStrategy('http://mail.ru'));
        $this->assertTrue($catalogChecker->check());
    }

    public function testJustRunNotInCatalog() 
    {
        $catalogChecker = new CatalogChecker(new DMOZSearchCatalogStrategy('justrun.ru'));
        $this->assertFalse($catalogChecker->check());
    }
}
