<?php

use Sheepla\Factory\GetShipmentDetails as Factory;
use Sheepla\Request\Shipment\ShipmentByEDTN;

/**
 * @covers \Sheepla\Factory\GetShipmentDetails
 */
class GetShipmentDetailsTest extends \PHPUnit_Framework_TestCase
{
    public function testConstructor()
    {
        $apiKey = 'API_KEY';

        $factory = new Factory($apiKey);

        $this->assertInstanceOf(Factory::class, $factory);
        $this->assertEquals($apiKey, $factory->getApiKey());

        return $factory;
    }

    /**
     * @param Factory $factory
     * @return ShipmentByEDTN
     * @depends testConstructor
     */
    public function testCreateShipmentByEDTNRequest(Factory $factory)
    {
        $edtn = '123xyz';

        $shipment = $factory->createShipmentByEDTNRequest($edtn);

        $this->assertInstanceOf(ShipmentByEDTN::class, $shipment);
        $this->assertEquals($edtn, $shipment->getEdtn());
    }

    /**
     * @param Factory $factory
     * @depends testConstructor
     */
    public function testGetShipmentDetailsRequest(Factory $factory)
    {
        $shipments = $factory->createRequest();

        $this->assertInstanceOf(\Sheepla\Request\GetShipmentDetails::class, $shipments);
    }

    /**
     * @param Factory $factory
     * @depends testConstructor
     */
    public function testGCreateResponse(Factory $factory)
    {
        $shipments = $factory->createResponse();

        $this->assertInstanceOf(\Sheepla\Response\GetShipmentDetails::class, $shipments);
    }
}
