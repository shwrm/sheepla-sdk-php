<?php

namespace Sheepla\Response\Shipment;

use JMS\Serializer\Annotation as JMS;

class Shipment
{
    /**
     * @JMS\AccessType("public_method")
     * @JMS\Type("string")
     * @JMS\XmlAttribute()
     */
    private $id;

    /**
     * @JMS\AccessType("public_method")
     * @JMS\Type("string")
     */
    private $edtn;

    /**
     * Get id
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set id
     *
     * @param string $id
     * @return Shipment
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get edtn
     *
     * @return string
     */
    public function getEdtn()
    {
        return $this->edtn;
    }

    /**
     * Set edtn
     *
     * @param string $edtn
     * @return Shipment
     */
    public function setEdtn($edtn)
    {
        $this->edtn = $edtn;
        return $this;
    }
}
