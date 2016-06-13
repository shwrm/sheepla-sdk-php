<?php

namespace Sheepla\Request;

use JMS\Serializer\Annotation as JMS;
use Sheepla\Request\Shipment\ShipmentByEDTN;

/**
 * @JMS\XmlRoot("getLabelRequest");
 */
class GetLabel extends AbstractRequest
{
    use CollectShipmentsByEDTNs;

    /**
     * Get request method
     *
     * @return string
     */
    public function getRequestMethod()
    {
        return 'getLabel';
    }
}
