<?php

namespace Sheepla\Test;

use \Mockery as m;
use Sheepla\Request\CreateShipment;
use Sheepla\Request\Shipment\Shipment;

class CreateShipmentTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var CreateShipment
     */
    public static $createShipment;

    public static function setUpBeforeClass()
    {
        self::$createShipment = new CreateShipment('API_KEY');
    }

    public function testAuthentication()
    {
        $this->assertArrayHasKey('apiKey', self::$createShipment->getAuthentication());
        $this->assertContains('API_KEY', self::$createShipment->getAuthentication());
    }

    public function testRequestMethod()
    {
        $this->assertEquals('createShipment', self::$createShipment->getRequestMethod());
    }

    public function testAddShipment()
    {
        /** @var Shipment|m\Mock $shipment */
        $shipment = m::mock('Sheepla\Request\Shipment\Shipment');
        self::$createShipment->addShipment($shipment);
        self::$createShipment->addShipment($shipment);

        $this->assertInternalType('array', self::$createShipment->getShipments());
        $this->assertCount(2, self::$createShipment->getShipments());
        $this->assertContainsOnlyInstancesOf('Sheepla\Request\Shipment\Shipment', self::$createShipment->getShipments());
    }

    public function testRemoveShipment()
    {
        self::$createShipment->removeShipment(self::$createShipment->getShipments()[0]);

        $this->assertCount(1, self::$createShipment->getShipments());
    }
}