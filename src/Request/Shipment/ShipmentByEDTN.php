<?php

namespace Sheepla\Request\Shipment;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\XmlRoot("shipments")
 */
class ShipmentByEDTN
{
    /**
     * @var string
     * @JMS\XmlValue(cdata=false)
     * @JMS\AccessType("public_method")
     */
    private $edtn;

    /**
     * @return string
     */
    public function getEdtn()
    {
        return $this->edtn;
    }

    /**
     * @param mixed $edtn
     * @return $this
     */
    public function setEdtn($edtn)
    {
        $this->edtn = $edtn;

        return $this;
    }
}