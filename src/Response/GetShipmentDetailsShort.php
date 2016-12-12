<?php

namespace Sheepla\Response;

use Sheepla\Response\Shipment\ShipmentDetailsShort;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\XmlRoot("getShipmentDetailsShortResponse");
 */
class GetShipmentDetailsShort extends AbstractResponse
{
    /**
     * @JMS\AccessType("public_method")
     * @JMS\Accessor(setter = "setShipments")
     * @JMS\Type("array<Sheepla\Response\Shipment\ShipmentDetailsShort>")
     * @JMS\XmlList(entry="shipment")
     */
    private $shipments = [];

    /**
     * Get shipments
     *
     * @return ShipmentDetailsShort[]
     */
    public function getShipments()
    {
        return $this->shipments;
    }

    /**
     * Set shipments
     *
     * @param array $shipments
     * @return $this
     */
    public function setShipments(array $shipments)
    {
        $this->shipments = $shipments;
        return $this;
    }
}
