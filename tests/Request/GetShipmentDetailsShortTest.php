<?php

namespace Sheepla\Test\Request;

use \Mockery as m;
use Sheepla\Request\GetShipmentDetailsShort;
use Sheepla\Request\Shipment\ShipmentByEDTN;

class GetShipmentDetailsShortTest extends \PHPUnit_Framework_TestCase
{
    private static $shipmentByEDTNClassName;

    /** @var  GetShipmentDetailsShort */
    private static $getShipmentDetails;

    public static function setUpBeforeClass()
    {
        self::$shipmentByEDTNClassName = ShipmentByEDTN::class;
        self::$getShipmentDetails = new GetShipmentDetailsShort('API_KEY');
    }

    public function testAuthentication()
    {
        $this->assertArrayHasKey('apiKey', self::$getShipmentDetails->getAuthentication());
        $this->assertContains('API_KEY', self::$getShipmentDetails->getAuthentication());
    }

    public function testRequestMethod()
    {
        $this->assertEquals('getShipmentDetailsShort', self::$getShipmentDetails->getRequestMethod());
    }

    public function testAddShipment()
    {
        /** @var ShipmentByEDTN|m\Mock $shipment */
        $shipment = m::mock(self::$shipmentByEDTNClassName);

        self::$getShipmentDetails->addShipment($shipment);
        self::$getShipmentDetails->addShipment($shipment);

        $this->assertInternalType('array', self::$getShipmentDetails->getShipments());
        $this->assertCount(2, self::$getShipmentDetails->getShipments());
        $this->assertContainsOnlyInstancesOf(
            self::$shipmentByEDTNClassName,
            self::$getShipmentDetails->getShipments()
        );
    }
}
