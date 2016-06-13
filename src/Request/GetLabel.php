<?php

namespace Sheepla\Request;

use JMS\Serializer\Annotation as JMS;
use Sheepla\Request\Shipment\ShipmentByEDTN;

/**
 * @JMS\XmlRoot("getLabelRequest");
 */
class GetLabel extends AbstractRequest
{
    /**
     * @var ShipmentByEDTN[]
     * @JMS\AccessType("public_method")
     * @JMS\Accessor(setter = "addShipment")
     * @JMS\Type("array<Sheepla\Request\Shipment\ShipmentByEDTN>")
     * @JMS\XmlList(entry="shipmentEDTN")
     */
    private $shipments = [];

    /**
     * Add shipment
     *
     * @param ShipmentByEDTN $shipmentByEDTN
     * @return $this
     */
    public function addShipment(ShipmentByEDTN $shipmentByEDTN)
    {
        $this->shipments[] = $shipmentByEDTN;

        return $this;
    }

    /**
     * Remove shipment
     *
     * @param ShipmentByEDTN $shipmentByEDTN
     * @return $this
     */
    public function removeShipment(ShipmentByEDTN $shipmentByEDTN)
    {
        $key = array_search($shipmentByEDTN, $this->shipments, true);

        if ($key !== false) {
            unset($this->shipments[$key]);
        }

        return $this;
    }

    /**
     * Get shipments
     *
     * @return Shipment\ShipmentByEDTN[]
     */
    public function getShipments()
    {
        return $this->shipments;
    }

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
