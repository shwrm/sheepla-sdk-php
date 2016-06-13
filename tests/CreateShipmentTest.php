<?php

namespace Sheepla\Test;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response;
use Mockery as m;
use Sheepla\Client;
use Sheepla\Request\CreateShipment;
use Sheepla\Request\Shipment\Contact;
use Sheepla\Request\Shipment\Recipient;
use Sheepla\Request\Shipment\Sender;
use Sheepla\Request\Shipment\Service\Param;
use Sheepla\Request\Shipment\Service\Service;
use Sheepla\Request\Shipment\Shipment;
use Sheepla\Response\CreateShipment as ResponseCreateShipment;

class CreateShipmentTest extends AbstractTest
{
    /**
     * @var CreateShipment
     */
    public static $createShipment;

    /**
     *
     */
    public static function setUpBeforeClass()
    {
        parent::setUpBeforeClass();
        self::$createShipment = new CreateShipment('API_KEY');
    }

    public function testAuthentication()
    {
        $this->assertArrayHasKey('apiKey', self::$createShipment->getAuthentication());
        $this->assertContains('API_KEY', self::$createShipment->getAuthentication());
    }

    public function testRequestMethod()
    {
        $this->assertEquals('createShipment', self::$createShipment->getRequestMethod());
    }

    public function testAddShipment()
    {
        /** @var Shipment|m\Mock $shipment */
        $shipment = m::mock('Sheepla\Request\Shipment\Shipment');
        self::$createShipment->addShipment($shipment);
        self::$createShipment->addShipment($shipment);

        $this->assertInternalType('array', self::$createShipment->getShipments());
        $this->assertCount(2, self::$createShipment->getShipments());
        $this->assertContainsOnlyInstancesOf('Sheepla\Request\Shipment\Shipment', self::$createShipment->getShipments());
    }

    public function testRemoveShipment()
    {
        self::$createShipment->removeShipment(self::$createShipment->getShipments()[0]);

        $this->assertCount(1, self::$createShipment->getShipments());
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
        $senderContact = new Contact();
        $senderContact
            ->setFirstName('Marian')
            ->setLastName('Ziółko')
            ->setPhone('601000000')
            ->setEmail('Marian.Ziolko@sheepla.com');

        $sender = new Sender();
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

        $recipientContact = new Contact();
        $recipientContact
            ->setFirstName('Marzena')
            ->setLastName('Korzeniowska')
            ->setPhone('602000000')
            ->setEmail('Marzena.Korzeniowska@sheepla.com');

        $recipient = new Recipient();
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

        $service = new Service();
        $service->setCode(1);
        $param = new Param();
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

        $createShipmentRequest = new CreateShipment('API_KEY');
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

        $createShipmentRequest = new CreateShipment('API_KEY');
        $createShipmentResponse = new ResponseCreateShipment();

        $sheepla->sendRequest($createShipmentRequest);
        /** @var ResponseCreateShipment $response */
        $response = $sheepla->getResponse($createShipmentResponse);

        $this->assertInstanceOf(get_class($createShipmentResponse), $response);
        $this->assertNull($response->getErrors());
        $this->assertCount(1, $response->getShipments());
    }

}
