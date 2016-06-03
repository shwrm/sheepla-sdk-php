<?php

namespace Sheepla\Request\Shipment\Service;

use JMS\Serializer\Annotation as JMS;

class Param
{
    /**
     * @JMS\AccessType("public_method")
     * @JMS\XmlAttribute()
     */
    private $code;

    /**
     * @JMS\AccessType("public_method")
     * @JMS\XmlAttribute()
     */
    private $value;

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set code
     *
     * @param string $code
     * @return Param
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * Get value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set value
     *
     * @param string $value
     * @return Param
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }


}