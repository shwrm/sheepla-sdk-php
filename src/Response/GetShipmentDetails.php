<?php

namespace Sheepla\Response;

use JMS\Serializer\Annotation as JMS;
use Sheepla\Response\Shipment\ShipmentDetails;

/**
 * @JMS\XmlRoot("getShipmentDetailsResponse");
 */
class GetShipmentDetails extends AbstractResponse
{
    /**
     * @JMS\AccessType("public_method")
     * @JMS\Accessor(setter = "addShipment")
     * @JMS\Type("array<Sheepla\Response\Shipment\ShipmentDetails>")
     * @JMS\XmlList(entry="shipment")
     */
    private $shipments = [];

    /**
     * Get shipments
     *
     * @return ShipmentDetails[]
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
