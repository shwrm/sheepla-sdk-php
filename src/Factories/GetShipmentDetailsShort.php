<?php

namespace Sheepla\Factories;

class GetShipmentDetailsShort
{
    private $apiKey;

    /**
     * @return mixed
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * @param mixed $apiKey
     * @return $this
     */
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;

        return $this;
    }

    /**
     * getShipmentDetailsShort constructor.
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
        return new \Sheepla\Request\Shipment\ShipmentByEDTN($labelId);
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
