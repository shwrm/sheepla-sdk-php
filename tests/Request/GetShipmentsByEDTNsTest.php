<?php

namespace Sheepla\Test;

use Sheepla\Request\GetShipmentLabels;
use \Mockery as m;
use Sheepla\Request\Shipment\ShipmentByEDTN;

class GetShipmentsByEDTNsTest extends \PHPUnit_Framework_TestCase
{
    private static $getShipmentsClassName;

    /**
     * @var GetShipmentLabels
     */
    public static $getShipmentsByEDTNs;

    public static function setUpBeforeClass()
    {
        self::$getShipmentsClassName = ShipmentByEDTN::class;
        self::$getShipmentsByEDTNs = new GetShipmentLabels('api-key');
    }

    public function testAuthentication()
    {
        $this->assertArrayHasKey('apiKey', self::$getShipmentsByEDTNs->getAuthentication());
        $this->assertContains('api-key', self::$getShipmentsByEDTNs->getAuthentication());
    }

    public function testRequestMethod()
    {
        $this->assertEquals('GetLabel', self::$getShipmentsByEDTNs->getRequestMethod());
    }

    public function testAddShipment()
    {
        /** @var ShipmentByEDTN|m\Mock $shipment */
        $shipment = m::mock(self::$getShipmentsClassName);

        self::$getShipmentsByEDTNs->addShipment($shipment);
        self::$getShipmentsByEDTNs->addShipment($shipment);

        $this->assertInternalType('array', self::$getShipmentsByEDTNs->getShipments());
        $this->assertCount(2, self::$getShipmentsByEDTNs->getShipments());
        $this->assertContainsOnlyInstancesOf(self::$getShipmentsClassName, self::$getShipmentsByEDTNs->getShipments());
    }

    public function testRemoveShipment()
    {
        self::$getShipmentsByEDTNs->removeShipment(self::$getShipmentsByEDTNs->getShipments()[0]);

        $this->assertCount(1, self::$getShipmentsByEDTNs->getShipments());
    }
}