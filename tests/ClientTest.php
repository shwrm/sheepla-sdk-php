<?php

namespace Sheepla\Test;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use JMS\Serializer\SerializerInterface;
use Sheepla\Client;
use Sheepla\Request\AbstractRequest;
use \Mockery as m;

class ClientTest extends \PHPUnit_Framework_TestCase
{
    public function testSendRequest()
    {
        $mock = new MockHandler([
            new Response(200, [], '<bar></bar>'),
        ]);

        $handler = HandlerStack::create($mock);
        $client = new \GuzzleHttp\Client(['handler' => $handler]);

        /** @var SerializerInterface|m\Mock $serializer */
        $serializer = m::mock('JMS\Serializer\SerializerInterface');
        $serializer->shouldReceive('serialize')->andReturn('<foo></foo>');
        $sheepla = new Client($client, $serializer);
        /** @var AbstractRequest|m\Mock $request */
        $request = m::mock('Sheepla\Request\AbstractRequest');
        $request->shouldReceive('getRequestMethod')->andReturn('/foobar');
        $res = $sheepla->sendRequest($request);

        $this->assertEquals(200, $res->getStatusCode());
        $this->assertEquals('<bar></bar>', (string) $res->getBody());
    }

    public function testCarrierConstants()
    {
        $sheepla = new \ReflectionClass('Sheepla\Client');

        $this->assertEquals(22, $sheepla->getConstant('CARRIER_APACZKA'));
        $this->assertEquals(2, $sheepla->getConstant('CARRIER_DHL_POLSKA'));
        $this->assertEquals(3, $sheepla->getConstant('CARRIER_DPD'));
        $this->assertEquals(17, $sheepla->getConstant('CARRIER_GLS_POLAND'));
        $this->assertEquals(1, $sheepla->getConstant('CARRIER_INPOST'));
        $this->assertEquals(38, $sheepla->getConstant('CARRIER_INPOST_CROSS_BORDER'));
        $this->assertEquals(9, $sheepla->getConstant('CARRIER_KEX'));
        $this->assertEquals(36, $sheepla->getConstant('CARRIER_POCZTA_POLSKA'));
        $this->assertEquals(41, $sheepla->getConstant('CARRIER_QLINK'));
        $this->assertEquals(31, $sheepla->getConstant('CARRIER_RUCH'));
        $this->assertEquals(24, $sheepla->getConstant('CARRIER_SIODEMKA'));
        $this->assertEquals(39, $sheepla->getConstant('CARRIER_TBA_EXPRESS'));
        $this->assertEquals(12, $sheepla->getConstant('CARRIER_UPS_POLSKA'));
        $this->assertEquals(29, $sheepla->getConstant('CARRIER_XPRESS_COURIERS'));
    }
}
