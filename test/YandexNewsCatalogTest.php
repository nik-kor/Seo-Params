<?php
require_once dirname(__FILE__) . '/bootstrap.php';

class YandexNewsTest extends PHPUnit_Framework_TestCase
{
    public function testGoogleIsNotExistsInYandexCatalog() 
    {
        $catalogChecker = new CatalogChecker(new YandexNewsCatalogStrategy('google.ru'));
        $this->assertFalse($catalogChecker->check());
    }  

    public function testTravelMailRuIsInCatalog()
    {
        $catalogChecker = new CatalogChecker(new YandexNewsCatalogStrategy('travel.mail.ru'));
        $this->assertTrue($catalogChecker->check());
    }

}
