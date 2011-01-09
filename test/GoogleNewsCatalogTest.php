<?php
require_once dirname(__FILE__).'/bootstrap.php';

class GoogleNewsCatalogTest extends PHPUnit_Framework_TestCase
{
    public function testNewsMailRuIsInCatalog() 
    {
        $catalogChecker = new CatalogChecker(new GoogleNewsCatalogStrategy('news.mail.ru'));
        $this->assertTrue($catalogChecker->check());
    }
    public function testYandexNotInGoogleNewsCatalog() 
    {
        $catalogChecker = new catalogChecker(new GoogleNewsCatalogStrategy('yandex.ru'));
        $this->assertFalse($catalogChecker->check());
    }
}
