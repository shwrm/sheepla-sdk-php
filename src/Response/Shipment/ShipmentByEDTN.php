<?php

namespace Sheepla\Response\Shipment;

use JMS\Serializer\Annotation as JMS;
use Sheepla\Response\AbstractResponse;

class ShipmentByEDTN extends AbstractResponse
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
     * Get EDTN
     *
     * @return string
     */
    public function getEdtn()
    {
        return $this->edtn;
    }

    /**
     * Set EDTN
     *
     * @param mixed $edtn
     */
    public function setEdtn($edtn)
    {
        $this->edtn = $edtn;

        return $this;
    }

    /**
     * Get shipment label link
     *
     * @return string
     */
    public function getShipmentLabelLink()
    {
        return $this->shipmentLabelLink;
    }

    /**
     * Set shipment label link
     *
     * @param string $shipmentLabelLink
     *
     * @return $this
     */
    public function setShipmentLabelLink($shipmentLabelLink)
    {
        $this->shipmentLabelLink = $shipmentLabelLink;

        return $this;
    }
}