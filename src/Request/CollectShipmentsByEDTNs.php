<?php

namespace Sheepla\Request;

use Sheepla\Request\Shipment\ShipmentByEDTN;
use JMS\Serializer\Annotation as JMS;

trait CollectShipmentsByEDTNs
{
    /**
     * @JMS\AccessType("public_method")
     * @JMS\Accessor(setter = "addShipment")
     * @JMS\Type("array<Sheepla\Request\Shipment\ShipmentByEDTN>")
     * @JMS\XmlList(entry="shipmentEDTN")
     */
    private $shipments = [];

    public function addShipment(ShipmentByEDTN $shipmentByEDTN)
    {
        $this->shipments[] = $shipmentByEDTN;
    }

    public function removeShipment(ShipmentByEDTN $shipmentByEDTN)
    {
        $key = array_search($shipmentByEDTN, $this->shipments, true);

        if ($key !== false) {
            unset($this->shipments[$key]);
        }
    }

    public function getShipments()
    {
        return $this->shipments;
    }
}
