<?php

namespace Sheepla\Factory;

class GetShipmentDetailsShort
{
    /**
     * @var string
     */
    private $apiKey;

    /**
     * @return string
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * @param string $apiKey
     * @return $this
     */
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;

        return $this;
    }

    /**
     * @param string $apiKey
     */
    public function __construct($apiKey)
    {
        $this->setApiKey($apiKey);
    }

    /**
     * Create single element of request
     *
     * @param string $labelId
     * @return \Sheepla\Request\Shipment\ShipmentByEDTN
     */
    public function createShipmentByEDTNRequest($labelId)
    {
        $shipment = new \Sheepla\Request\Shipment\ShipmentByEDTN;

        $shipment->setEdtn($labelId);

        return $shipment;
    }

    /**
     * Create request
     *
     * @return \Sheepla\Request\GetShipmentDetailsShort
     */
    public function createRequest()
    {
        return new \Sheepla\Request\GetShipmentDetailsShort($this->getApiKey());
    }

    /**
     * Create an empty response
     *
     * @return \Sheepla\Response\GetShipmentDetailsShort
     */
    public function createResponse()
    {
        return new \Sheepla\Response\GetShipmentDetailsShort();
    }
}
