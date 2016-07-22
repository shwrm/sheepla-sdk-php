<?php

namespace Sheepla\Response\Shipment;

use JMS\Serializer\Annotation as JMS;
use Sheepla\Response\AbstractResponse;

class Shipment extends AbstractResponse
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
     * @JMS\AccessType("public_method")
     * @JMS\Type("integer")
     */
    private $statusId;

    /**
     * @JMS\AccessType("public_method")
     * @JMS\Type("string")
     */
    private $statusName;

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

    /**
     * @return mixed
     */
    public function getStatusId()
    {
        return $this->statusId;
    }

    /**
     * @param int $statusId
     * @return Shipment
     */
    public function setStatusId($statusId)
    {
        $this->statusId = $statusId;

        return $this;
    }

    /**
     * @return string
     */
    public function getStatusName()
    {
        return $this->statusName;
    }

    /**
     * @param string $statusName
     * @return $this
     */
    public function setStatusName($statusName)
    {
        $this->statusName = $statusName;

        return $this;
    }
}
