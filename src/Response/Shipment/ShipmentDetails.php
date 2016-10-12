<?php

namespace Sheepla\Response\Shipment;

use JMS\Serializer\Annotation as JMS;

class ShipmentDetails extends ShipmentDetailsShort
{
    /**
     * @JMS\Type("array<Sheepla\Response\Shipment\Status>")
     * @JMS\XmlList(entry="oldStasus")
     */
    private $statusHistory = [];

    /**
     * @return Status[]
     */
    public function getStatusHistory()
    {
        return $this->statusHistory;
    }
}
