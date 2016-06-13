<?php

namespace Sheepla\Request;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\XmlRoot("getShipmentDetailsShortRequest");
 */
class GetShipmentDetailsShort extends AbstractRequest
{
    use CollectShipmentsByEDTNs;

    public function getRequestMethod()
    {
        return 'getShipmentDetailsShort';
    }
}
