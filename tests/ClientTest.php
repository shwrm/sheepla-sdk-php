<?php

namespace Sheepla\Test;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Middleware;
use JMS\Serializer\Naming\IdenticalPropertyNamingStrategy;
use JMS\Serializer\Naming\SerializedNameAnnotationStrategy;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;
use Sheepla\Response\AbstractResponse;
use Sheepla\Response\CreateShipment;
use Sheepla\Response\GetPops;
use Sheepla\Client;
use Sheepla\Request\AbstractRequest;
use \Mockery as m;

class ClientTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Serializer
     */
    public static $serializer;

    public static function setUpBeforeClass()
    {
        // register jms annotation namespace
        \Doctrine\Common\Annotations\AnnotationRegistry::registerAutoloadNamespace('JMS\Serializer\Annotation', 'vendor/jms/serializer/src');

        self::$serializer = SerializerBuilder::create()
            ->setPropertyNamingStrategy(new SerializedNameAnnotationStrategy(new IdenticalPropertyNamingStrategy()))
            ->build();
    }

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
        $this->assertEquals('<bar></bar>', (string)$sheepla->getBody());
    }

    public function testGetResponse()
    {
        $mock = new MockHandler([
            new Response(200, [], '<bar></bar>'),
        ]);
        $handler = HandlerStack::create($mock);
        $client = new \GuzzleHttp\Client(['handler' => $handler]);

        /** @var AbstractResponse|m\Mock $response */
        $response = m::mock('Sheepla\Response\AbstractResponse');
        /** @var SerializerInterface|m\Mock $serializer */
        $serializer = m::mock('JMS\Serializer\SerializerInterface');
        $serializer->shouldReceive('deserialize')->andReturn($response);
        $sheepla = new Client($client, $serializer);
        $sheeplaResponse = $sheepla->getResponse($response);

        $this->assertInstanceOf(get_class($response), $sheeplaResponse);
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

    public function testFormatConstants()
    {
        $sheepla = new \ReflectionClass('Sheepla\Client');

        $this->assertEquals('json', $sheepla->getConstant('FORMAT_JSON'));
        $this->assertEquals('xml', $sheepla->getConstant('FORMAT_XML'));
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
        $getPopsRequest = new \Sheepla\Request\GetPops('API_KEY');
        $getPopsRequest
            ->setCarrierId(31)
            ->setCarrierAccountId(1)
            ->setTemplateId(1);

        $sheepla->sendRequest($getPopsRequest);

        /** @var \GuzzleHttp\Psr7\Request $request */
        $request = current($container)['request'];

        $this->assertXmlStringEqualsXmlFile('tests/Resources/Request/getPops.xml', (string)$request->getBody());
    }

    public function testGetPopsResponse()
    {
        $mock = new MockHandler([
            new Response(200, [], file_get_contents('tests/Resources/Response/getPops.xml')),
        ]);

        $handler = HandlerStack::create($mock);
        $client = new \GuzzleHttp\Client(['handler' => $handler]);

        $sheepla = new Client($client, self::$serializer);

        $getPopsRequest = new \Sheepla\Request\GetPops('API_KEY');
        $getPopsResponse = new \Sheepla\Response\GetPops();

        $sheepla->sendRequest($getPopsRequest);
        /** @var GetPops $response */
        $response = $sheepla->getResponse($getPopsResponse);

        $this->assertInstanceOf(get_class($getPopsResponse), $response);
        $this->assertNull($response->getErrors());
        $this->assertCount(3, $response->getPops());
    }

    public function testCreateShipmentRequest()
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
        $senderContact = new \Sheepla\Request\Shipment\Contact();
        $senderContact
            ->setFirstName('Marian')
            ->setLastName('Ziółko')
            ->setPhone('601000000')
            ->setEmail('Marian.Ziolko@sheepla.com');

        $sender = new \Sheepla\Request\Shipment\Sender();
        $sender
            ->setIsCompany(false)
            ->setCompanyName('senderCompany')
            ->setFirstName('Marian')
            ->setLastName('Ziółko')
            ->setStreet('Żelazna')
            ->setHomeNumber('67/77')
            ->setZipCode('00-871')
            ->setCity('Warszawa')
            ->setCountryCode('PL')
            ->setContact($senderContact);

        $recipientContact = new \Sheepla\Request\Shipment\Contact();
        $recipientContact
            ->setFirstName('Marzena')
            ->setLastName('Korzeniowska')
            ->setPhone('602000000')
            ->setEmail('Marzena.Korzeniowska@sheepla.com');

        $recipient = new \Sheepla\Request\Shipment\Recipient();
        $recipient
            ->setIsCompany(false)
            ->setCompanyName('recipientCompany')
            ->setFirstName('Marzena')
            ->setLastName('Korzeniowska')
            ->setStreet('1 Maja')
            ->setHomeNumber('78')
            ->setZipCode('02-495')
            ->setCity('Warszawa')
            ->setCountryCode('PL')
            ->setContact($recipientContact);

        $service = new \Sheepla\Request\Shipment\Service\Service();
        $service->setCode(1);
        $param = new \Sheepla\Request\Shipment\Service\Param();
        $param
            ->setCode('RuchDestinationPOP')
            ->setValue('WS-703256-31-09');
        $service->addParam($param);

        $shipment = new \Sheepla\Request\Shipment\Shipment();
        $shipment
            ->setId('testShipmentApi1')
            ->setSender($sender)
            ->setRecipient($recipient)
            ->setCarrierAccount('RUCH')
            ->setService($service)
            ->setDescription('Test shipment description')
            ->setConfirmAfterCreate(true);

        $createShipmentRequest = new \Sheepla\Request\CreateShipment('API_KEY');
        $createShipmentRequest->addShipment($shipment);

        $sheepla->sendRequest($createShipmentRequest);

        /** @var \GuzzleHttp\Psr7\Request $request */
        $request = current($container)['request'];

        $this->assertXmlStringEqualsXmlFile('tests/Resources/Request/createShipment.xml', (string)$request->getBody());
    }

    public function testCreateShipmentResponse()
    {
        $mock = new MockHandler([
            new Response(200, [], file_get_contents('tests/Resources/Response/createShipment.xml')),
        ]);

        $handler = HandlerStack::create($mock);
        $client = new \GuzzleHttp\Client(['handler' => $handler]);

        $sheepla = new Client($client, self::$serializer);

        $createShipmentRequest = new \Sheepla\Request\CreateShipment('API_KEY');
        $createShipmentResponse = new \Sheepla\Response\CreateShipment();

        $sheepla->sendRequest($createShipmentRequest);
        /** @var CreateShipment $response */
        $response = $sheepla->getResponse($createShipmentResponse);

        $this->assertInstanceOf(get_class($createShipmentResponse), $response);
        $this->assertNull($response->getErrors());
        $this->assertCount(1, $response->getShipments());
    }
}
