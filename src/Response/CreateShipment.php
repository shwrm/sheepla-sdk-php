<?php

namespace Sheepla\Response;

use JMS\Serializer\Annotation as JMS;

class CreateShipment extends AbstractResponse
{
    /**
     * @JMS\AccessType("public_method")
     * @JMS\Type("array<Sheepla\Response\Shipment\Shipment>")
     * @JMS\XmlList(entry="shipment")
     */
    private $shipments;

    /**
     * Get shipments
     *
     * @return \Sheepla\Response\Shipment\Shipment[]
     */
    public function getShipments()
    {
        return $this->shipments;
    }

    /**
     * Set shipments
     *
     * @param array $shipments
     * @return CreateShipment
     */
    public function setShipments(array $shipments)
    {
        $this->shipments = $shipments;
        return $this;
    }
}
