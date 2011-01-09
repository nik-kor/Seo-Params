<?php
require_once dirname(__FILE__) . '/bootstrap.php';

class SiteParametersTest extends PHPUnit_Framework_TestCase
{
    public function testPr() 
    {
        $this->assertTrue(SiteParameters::getPr('http://mail.ru') > 5);
        $this->assertFalse(SiteParameters::getPr('http://justrun.ru') > 5);
    }

    public function testTcy()
    {
        $this->assertTrue(SiteParameters::getTcy('http://mail.ru') > 30000);
        $this->assertEquals(SiteParameters::getTcy('http://justrun.ru'), 0);
    }
}
