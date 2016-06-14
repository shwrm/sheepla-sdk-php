<?php

namespace Sheepla\Test;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response;
use Sheepla\Client;
use Sheepla\Request\GetShipmentDetailsShort as GetShipmentDetailsShortRequest;
use Sheepla\Response\GetShipmentDetailsShort as GetShipmentDetailsShortResponse;
use Sheepla\Request\Shipment\ShipmentByEDTN;

class GetShipmentDetailsShortTest extends AbstractTest
{
    public function testGetShipmentDetailsShortRequest()
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

        $getShipmentDetailsRequest = new GetShipmentDetailsShortRequest('API_KEY');

        $edtns = ['222222222222', '7rdzcxkvjxck'];

        foreach ($edtns as $edtn) {
            $shipmentByEDTN = new ShipmentByEDTN();
            $shipmentByEDTN->setEdtn($edtn);
            $getShipmentDetailsRequest->addShipment($shipmentByEDTN);
        }

        $sheepla->sendRequest($getShipmentDetailsRequest);

        /** @var \GuzzleHttp\Psr7\Request $request */
        $request = current($container)['request'];

        $this->assertXmlStringEqualsXmlFile('tests/Resources/Request/getShipmentDetailsShort.xml', (string) $request->getBody());
    }

    public function testGetShipmentDetailsShortResponse()
    {
        $mock = new MockHandler([
            new Response(200, [], file_get_contents('tests/Resources/Response/getShipmentDetailsShort.xml')),
        ]);

        $handler = HandlerStack::create($mock);
        $client = new \GuzzleHttp\Client(['handler' => $handler]);

        $sheepla = new Client($client, self::$serializer);

        $getShipmentDetailsShortRequest = new GetShipmentDetailsShortRequest('API_KEY');
        $getShipmentDetailsShortResponse = new GetShipmentDetailsShortResponse();

        $sheepla->sendRequest($getShipmentDetailsShortRequest);

        /** @var GetShipmentDetailsShortResponse $response */
        $response = $sheepla->getResponse($getShipmentDetailsShortResponse);

        $this->assertInstanceOf(get_class($getShipmentDetailsShortResponse), $response);
        $this->assertNull($response->getErrors());
        $this->assertCount(2, $response->getShipments());
    }
}
