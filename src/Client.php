<?php

namespace Sheepla;

use GuzzleHttp\Client as HttpClient;
use JMS\Serializer\SerializerInterface;
use Sheepla\Request\AbstractRequest;
use Sheepla\Response\AbstractResponse;

class Client
{
    const CARRIER_APACZKA = 22;
    const CARRIER_DHL_POLSKA = 2;
    const CARRIER_DPD = 3;
    const CARRIER_GLS_POLAND = 17;
    const CARRIER_INPOST = 1;
    const CARRIER_INPOST_CROSS_BORDER = 38;
    const CARRIER_KEX = 9;
    const CARRIER_POCZTA_POLSKA = 36;
    const CARRIER_QLINK = 41;
    const CARRIER_RUCH = 31;
    const CARRIER_SIODEMKA = 24;
    const CARRIER_TBA_EXPRESS = 39;
    const CARRIER_UPS_POLSKA = 12;
    const CARRIER_XPRESS_COURIERS = 29;

    const FORMAT_JSON = 'json';
    const FORMAT_XML = 'xml';

    /**
     * Internal storage for client
     *
     * @var HttpClient
     */
    private $client;

    /**
     * Internal storage for object serializer
     *
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * Internal storage for response body
     *
     * @var string
     */
    private $body;

    /**
     * @param HttpClient $client
     * @param SerializerInterface $serializer
     */
    public function __construct(HttpClient $client, SerializerInterface $serializer)
    {
        $this->setClient($client);
        $this->setSerializer($serializer);
    }

    /**
     * Send request
     * 
     * @param AbstractRequest $request
     * @return mixed
     */
    public function sendRequest(AbstractRequest $request)
    {
        $response = $this
            ->getClient()
            ->request(
                'POST',
                $request->getRequestMethod(),
                [
                    'body' => $this->getSerializer()->serialize($request, self::FORMAT_XML),
                ]
            );

        $this->setBody($response->getBody());

        return $response;
    }

    /**
     * Get serialized response
     * 
     * @param AbstractResponse $response
     * @param string $format
     * @return AbstractResponse
     */
    public function getResponse(AbstractResponse $response, $format = self::FORMAT_JSON)
    {
        return $this->getSerializer()->deserialize($this->getBody(), $response, $format);
    }

    /**
     * Get client
     *
     * @return HttpClient
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Set client
     *
     * @param HttpClient $client
     * @return Client
     */
    public function setClient(HttpClient $client)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get serializer
     *
     * @return SerializerInterface
     */
    public function getSerializer()
    {
        return $this->serializer;
    }

    /**
     * Set serializer
     *
     * @param SerializerInterface $serializer
     * @return Client
     */
    public function setSerializer(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;

        return $this;
    }

    /**
     * Get body
     *
     * @return string
     */
    public function getBody() {
        return $this->body;
    }

    /**
     * Set body
     *
     * @param string $body
     * @return Client
     */
    public function setBody($body) {
        $this->body = $body;

        return $this;
    }
}
