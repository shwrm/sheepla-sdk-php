<?php

namespace Sheepla\Test;

use \Mockery as m;
use Sheepla\Request\GetPops;

class GetPopsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GetPops
     */
    public static $getPops;

    public static function setUpBeforeClass()
    {
        self::$getPops = new GetPops('API_KEY');
    }

    public function testAuthentication()
    {
        $this->assertArrayHasKey('apiKey', self::$getPops->getAuthentication());
        $this->assertContains('API_KEY', self::$getPops->getAuthentication());
    }

    public function testRequestMethod()
    {
        $this->assertEquals('getPOPs', self::$getPops->getRequestMethod());
    }
}