<?php

namespace Sheepla\Request;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\XmlRoot("getShipmentDetailsRequest");
 */
class GetShipmentDetails extends AbstractRequest
{
    use CollectShipmentsByEDTNs;

    public function getRequestMethod()
    {
        return 'getShipmentDetails';
    }
}
