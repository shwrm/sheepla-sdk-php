<?php

namespace Sheepla\Test\Request;

use Mockery as m;
use Sheepla\Request\Authentication;
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
        $authentication = self::$getShipmentDetails->getAuthentication();
        $this->assertInstanceOf(Authentication::class, $authentication);
        $this->assertEquals('API_KEY', $authentication->getApiKey());
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
