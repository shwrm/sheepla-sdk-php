<?php

namespace Sheepla\Request;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\XmlRoot("getPOPsRequest")
 */
class GetPops extends AbstractRequest
{
    /**
     * @JMS\AccessType("public_method")
     * @JMS\XmlElement(cdata = false)
     */
    private $carrierId;

    /**
     * @JMS\AccessType("public_method")
     * @JMS\XmlElement(cdata = false)
     */
    private $carrierAccountId;

    /**
     * @JMS\AccessType("public_method")
     * @JMS\XmlElement(cdata = false)
     */
    private $templateId;

    /**
     * Get carrierId
     *
     * @return int
     */
    public function getCarrierId()
    {
        return $this->carrierId;
    }

    /**
     * Set carrierId
     *
     * @param int $carrierId
     * @return GetPops
     */
    public function setCarrierId($carrierId)
    {
        $this->carrierId = $carrierId;
        return $this;
    }

    /**
     * Get carrierAccountId
     *
     * @return int
     */
    public function getCarrierAccountId()
    {
        return $this->carrierAccountId;
    }

    /**
     * Set carrierAccountId
     *
     * @param int $carrierAccountId
     * @return GetPops
     */
    public function setCarrierAccountId($carrierAccountId)
    {
        $this->carrierAccountId = $carrierAccountId;
        return $this;
    }

    /**
     * Get templateId
     *
     * @return int
     */
    public function getTemplateId()
    {
        return $this->templateId;
    }

    /**
     * Set templateId
     *
     * @param int $templateId
     * @return GetPops
     */
    public function setTemplateId($templateId)
    {
        $this->templateId = $templateId;
        return $this;
    }

    /**
     * @see AbstractRequest::getRequestMethod()
     */
    public function getRequestMethod()
    {
        return 'getPOPs';
    }
}
