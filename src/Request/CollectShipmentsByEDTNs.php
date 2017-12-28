<?php

namespace Sheepla\Request;

use Sheepla\Request\Shipment\ShipmentByEDTN;
use JMS\Serializer\Annotation as JMS;

trait CollectShipmentsByEDTNs
{
    /**
     * @var ShipmentByEDTN[]
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
}
