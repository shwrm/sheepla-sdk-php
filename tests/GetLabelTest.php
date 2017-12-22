<?php

namespace Sheepla\Test;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response;
use Mockery as m;
use Sheepla\Client;
use Sheepla\Request\Authentication;
use Sheepla\Request\GetLabel;
use Sheepla\Request\Shipment\ShipmentByEDTN;
use Sheepla\Response\GetLabel as GetShipmentLabelsResponse;

class GetLabelTest extends AbstractTest
{
    private static $getShipmentsClassName;

    /**
     * @var GetLabel
     */
    public static $getShipmentsByEDTNs;

    public static function setUpBeforeClass()
    {
        parent::setUpBeforeClass();
        self::$getShipmentsClassName = ShipmentByEDTN::class;
        self::$getShipmentsByEDTNs = new GetLabel('api-key');
    }

    public function testAuthentication()
    {
        $authentication = self::$getShipmentsByEDTNs->getAuthentication();
        $this->assertInstanceOf(Authentication::class, $authentication);
        $this->assertEquals('api-key', $authentication->getApiKey());
    }

    public function testRequestMethod()
    {
        $this->assertEquals('getLabel', self::$getShipmentsByEDTNs->getRequestMethod());
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

    public function testGetShipmentLabelsRequest()
    {
        $mock = new MockHandler([
            new Response(200, [], '<bar></bar>'),
        ]);

        $container = [];
        $history = Middleware::history($container);

        $stack = HandlerStack::create($mock);
        $stack->push($history);

        $client = new \GuzzleHttp\Client(['handler' => $stack]);

        $sheepla = new Client($client, self::$serializer);

        $getShipmentLabelsRequest = new GetLabel('API_KEY');

        foreach (['222222222222', '7rdzcxkvjxck'] as $edtn) {
            $shipmentByEDTN = new ShipmentByEDTN();
            $shipmentByEDTN->setEdtn($edtn);
            $getShipmentLabelsRequest->addShipment($shipmentByEDTN);
        }

        $sheepla->sendRequest($getShipmentLabelsRequest);

        /** @var \GuzzleHttp\Psr7\Request $request */
        $request = current($container)['request'];

        $this->assertXmlStringEqualsXmlFile('tests/Resources/Request/getShipmentLabels.xml', (string) $request->getBody());
    }

    public function testGetShipmentLabelsResponse()
    {
        $mock = new MockHandler([
            new Response(200, [], file_get_contents('tests/Resources/Response/getShipmentLabels.xml')),
        ]);

        $handler = HandlerStack::create($mock);
        $client = new \GuzzleHttp\Client(['handler' => $handler]);

        $sheepla = new Client($client, self::$serializer);

        $getShipmentLabelsRequest = new GetLabel('API_KEY');
        $getShipmentLabelsResponse = new GetShipmentLabelsResponse();

        $sheepla->sendRequest($getShipmentLabelsRequest);

        /** @var GetShipmentLabelsResponse $response */
        $response = $sheepla->getResponse($getShipmentLabelsResponse);

        $this->assertInstanceOf(get_class($getShipmentLabelsResponse), $response);
        $this->assertNull($response->getErrors());
        $this->assertCount(2, $response->getShipments());
    }
}
