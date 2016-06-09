<?php

namespace Sheepla\Response\Shipment;

use JMS\Serializer\Annotation as JMS;

class ShipmentByEDTN
{
    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\XmlAttribute()
     * @JMS\AccessType("public_method")
     */
    private $edtn;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\XmlElement(cdata=false)
     * @JMS\AccessType("public_method")
     */
    private $shipmentLabelLink;

    /**
     * @return string
     */
    public function getEdtn()
    {
        return $this->edtn;
    }

    /**
     * @param mixed $edtn
     */
    public function setEdtn($edtn)
    {
        $this->edtn = $edtn;
    }

    /**
     * @return string
     */
    public function getShipmentLabelLink()
    {
        return $this->shipmentLabelLink;
    }

    /**
     * @param string $shipmentLabelLink
     * @return $this
     */
    public function setShipmentLabelLink($shipmentLabelLink)
    {
        $this->shipmentLabelLink = $shipmentLabelLink;
        return $this;
    }
}