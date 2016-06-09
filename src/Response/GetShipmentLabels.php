<?php

namespace Sheepla\Response;

use JMS\Serializer\Annotation as JMS;
use Sheepla\Response\AbstractResponse;

/**
 * @JMS\XmlRoot("getLabelResponse");
 */
class GetShipmentLabels extends AbstractResponse
{
    /**
     * @JMS\AccessType("public_method")
     * @JMS\Accessor(setter = "addShipment")
     * @JMS\Type("array<Sheepla\Response\Shipment\ShipmentByEDTN>")
     * @JMS\XmlList(entry="shipment")
     */
    private $shipments = [];

    /**
     * Get shipments
     *
     * @return \Sheepla\Response\Shipment\ShipmentByEDTN[]
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