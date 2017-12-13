<?php

namespace Sheepla\Request\Shipment\Service;

use JMS\Serializer\Annotation as JMS;

class Service
{
    /**
     * @JMS\AccessType("public_method")
     * @JMS\XmlAttribute()
     * @JMS\Type("string")
     */
    private $code;

    /**
     * @JMS\AccessType("public_method")
     * @JMS\Accessor(setter = "addParam")
     * @JMS\Type("array<Sheepla\Request\Shipment\Service\Param>")
     * @JMS\XmlList(entry="param")
     */
    private $params;

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
     * @return Service
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * Get params
     *
     * @return \Sheepla\Request\Shipment\Service\Param[]
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * Add param
     *
     * @param \Sheepla\Request\Shipment\Service\Param $param
     * @return Service
     */
    public function addParam(\Sheepla\Request\Shipment\Service\Param $param)
    {
        $this->params[] = $param;
        return $this;
    }

    /**
     * Remove param
     *
     * @param \Sheepla\Request\Shipment\Service\Param $param
     * @return Service
     */
    public function removeParam(\Sheepla\Request\Shipment\Service\Param $param)
    {
        $key = array_search($param, $this->params, true);

        if ($key !== false) {
            unset($this->params[$key]);
        }

        return $this;
    }
}
