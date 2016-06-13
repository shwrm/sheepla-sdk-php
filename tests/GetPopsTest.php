<?php

namespace Sheepla\Test;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response;
use Sheepla\Client;
use Sheepla\Request\GetPops as RequestGetPops;
use Sheepla\Response\GetPops as ResponseGetPops;

class GetPopsTest extends AbstractTest
{
    /**
     * @var RequestGetPops
     */
    public static $getPops;

    public static function setUpBeforeClass()
    {
        parent::setUpBeforeClass();
        self::$getPops = new RequestGetPops('API_KEY');
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

    public function testGetPopsRequest()
    {
        $mock = new MockHandler([
            new Response(200, [], '<bar></bar>'),
        ]);

        $container = [];
        $history = Middleware::history($container);
        $handler = HandlerStack::create($mock);
        $handler->push($history);
        $client = new \GuzzleHttp\Client(['handler' => $handler]);

        $sheepla = new Client($client, self::$serializer);
        $getPopsRequest = new RequestGetPops('API_KEY');
        $getPopsRequest
            ->setCarrierId(31)
            ->setCarrierAccountId(1)
            ->setTemplateId(1);

        $sheepla->sendRequest($getPopsRequest);

        /** @var \GuzzleHttp\Psr7\Request $request */
        $request = current($container)['request'];

        $this->assertXmlStringEqualsXmlFile('tests/Resources/Request/getPops.xml', (string) $request->getBody());
    }

    public function testGetPopsResponse()
    {
        $mock = new MockHandler([
            new Response(200, [], file_get_contents('tests/Resources/Response/getPops.xml')),
        ]);

        $handler = HandlerStack::create($mock);
        $client = new \GuzzleHttp\Client(['handler' => $handler]);

        $sheepla = new Client($client, self::$serializer);

        $getPopsRequest = new RequestGetPops('API_KEY');
        $getPopsResponse = new ResponseGetPops();

        $sheepla->sendRequest($getPopsRequest);
        /** @var ResponseGetPops $response */
        $response = $sheepla->getResponse($getPopsResponse);

        $this->assertInstanceOf(get_class($getPopsResponse), $response);
        $this->assertNull($response->getErrors());
        $this->assertCount(3, $response->getPops());
    }
}
