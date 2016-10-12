<?php

namespace Sheepla\Test;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response;
use Sheepla\Client;
use Sheepla\Request\GetShipmentDetails as GetShipmentDetailsRequest;
use Sheepla\Response\GetShipmentDetails as GetShipmentDetailsResponse;
use Sheepla\Request\Shipment\ShipmentByEDTN;

class GetShipmentDetailsTest extends AbstractTest
{
    public function testGetShipmentDetailsRequest()
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

        $getShipmentDetailsRequest = new GetShipmentDetailsRequest('API_KEY');

        $edtns = ['XYZ'];

        foreach ($edtns as $edtn) {
            $shipmentByEDTN = new ShipmentByEDTN();
            $shipmentByEDTN->setEdtn($edtn);
            $getShipmentDetailsRequest->addShipment($shipmentByEDTN);
        }

        $sheepla->sendRequest($getShipmentDetailsRequest);

        /** @var \GuzzleHttp\Psr7\Request $request */
        $request = current($container)['request'];

        $this->assertXmlStringEqualsXmlFile('tests/Resources/Request/getShipmentDetails.xml', (string)$request->getBody());
    }

    public function testGetShipmentDetailsResponse()
    {
        $mock = new MockHandler([
            new Response(200, [], file_get_contents('tests/Resources/Response/getShipmentDetails.xml')),
        ]);

        $handler = HandlerStack::create($mock);
        $client = new \GuzzleHttp\Client(['handler' => $handler]);

        $sheepla = new Client($client, self::$serializer);

        $getShipmentDetailsRequest = new GetShipmentDetailsRequest('API_KEY');
        $getShipmentDetailsResponse = new GetShipmentDetailsResponse();

        $sheepla->sendRequest($getShipmentDetailsRequest);

        /** @var GetShipmentDetailsResponse $response */
        $response = $sheepla->getResponse($getShipmentDetailsResponse);

        $this->assertInstanceOf(get_class($getShipmentDetailsResponse), $response);
        $this->assertNull($response->getErrors());
        $this->assertCount(1, $response->getShipments());
    }
}
