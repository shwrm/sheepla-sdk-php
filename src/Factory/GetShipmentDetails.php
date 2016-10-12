<?php

namespace Sheepla\Factory;

use Sheepla\Request\GetShipmentDetails as Request;
use Sheepla\Response\GetShipmentDetails as Response;

class GetShipmentDetails extends GetShipmentDetailsShort
{
    /**
     * Create request
     *
     * @return Request
     */
    public function createRequest()
    {
        return new Request($this->getApiKey());
    }

    /**
     * Create an empty response
     *
     * @return Response
     */
    public function createResponse()
    {
        return new Response();
    }
}
