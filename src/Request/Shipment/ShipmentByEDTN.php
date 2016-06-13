<?php

namespace Sheepla\Request\Shipment;

use JMS\Serializer\Annotation as JMS;

class ShipmentByEDTN
{
    /**
     * EDTN
     *
     * @var string
     * @JMS\XmlValue(cdata=false)
     * @JMS\AccessType("public_method")
     */
    private $edtn;

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
     * @return $this
     */
    public function setEdtn($edtn)
    {
        $this->edtn = $edtn;

        return $this;
    }
}