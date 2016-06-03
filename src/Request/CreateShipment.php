<?php

namespace Sheepla\Request;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\XmlRoot("createShipmentRequest")
 */
class CreateShipment extends AbstractRequest
{
    /**
     * @JMS\AccessType("public_method")
     * @JMS\Accessor(setter = "addShipment")
     * @JMS\Type("array<Sheepla\Request\Shipment\Shipment>")
     * @JMS\XmlList(entry="shipment")
     */
    private $shipments;

    /**
     * Get shipments
     *
     * @return \Sheepla\Request\Shipment\Shipment[]
     */
    public function getShipments()
    {
        return $this->shipments;
    }

    /**
     * Add shipment
     *
     * @param \Sheepla\Request\Shipment\Shipment $shipment
     * @return CreateShipment
     */
    public function addShipment(\Sheepla\Request\Shipment\Shipment $shipment)
    {
        $this->shipments[] = $shipment;
        return $this;
    }

    /**
     * Remove shipment
     *
     * @param \Sheepla\Request\Shipment\Shipment $shipment
     * @return CreateShipment
     */
    public function removeShipment(\Sheepla\Request\Shipment\Shipment $shipment)
    {
        $key = array_search($shipment, $this->shipments, true);

        if ($key !== false) {
            unset($this->shipments[$key]);
        }

        return $this;
    }

    /**
     * @see AbstractRequest::getRequestMethod()
     */
    public function getRequestMethod()
    {
        return 'createShipment';
    }
}
