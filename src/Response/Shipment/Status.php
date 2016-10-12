<?php

namespace Sheepla\Response\Shipment;

use JMS\Serializer\Annotation as JMS;

class Status
{
    /**
     * @JMS\Type("integer")
     */
    private $statusId;

    /**
     * @JMS\Type("integer")
     */
    private $subStatusId;

    /**
     * @JMS\Type("string")
     */
    private $statusName;

    /**
     * @JMS\Type("string")
     */
    private $subStatusName;

    /**
     * @return integer
     */
    public function getStatusId()
    {
        return $this->statusId;
    }

    /**
     * @return integer
     */
    public function getSubStatusId()
    {
        return $this->subStatusId;
    }

    /**
     * @return string
     */
    public function getStatusName()
    {
        return $this->statusName;
    }

    /**
     * @return string
     */
    public function getSubStatusName()
    {
        return $this->subStatusName;
    }
}
