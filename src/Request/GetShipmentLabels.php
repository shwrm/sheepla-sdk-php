<?php

namespace Sheepla\Request;

use JMS\Serializer\Annotation as JMS;
use Sheepla\Request\AbstractRequest;
use Sheepla\Request\Shipment\ShipmentByEDTN;

/**
 * @JMS\XmlRoot("getLabelRequest");
 */
class GetShipmentLabels extends AbstractRequest
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

    public function getRequestMethod()
    {
        return 'GetLabel';
    }
}
