<?php

namespace Sheepla\Response\Shipment;

use JMS\Serializer\Annotation as JMS;
use Sheepla\Response\AbstractResponse;

class ShipmentDetailsShort extends AbstractResponse
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
     * @JMS\XmlAttribute()
     * @JMS\AccessType("public_method")
     */
    private $ctn;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\XmlAttribute()
     * @JMS\AccessType("public_method")
     */
    private $externalOrderId;

    /**
     * @var int
     * @JMS\Type("integer")
     * @JMS\AccessType("public_method")
     */
    private $currentStatusId;

    /**
     * @var int
     * @JMS\Type("integer")
     * @JMS\AccessType("public_method")
     */
    private $currentSubStatusId;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\AccessType("public_method")
     */
    private $currentStatusName;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\AccessType("public_method")
     */
    private $currentSubStatusName;

    /**
     * @var bool
     * @JMS\Type("string")
     * @JMS\AccessType("public_method")
     * @JMS\Accessor(getter="isDeleted", setter="setIsDeleted")
     */
    private $isDeleted;

    /**
     * @var \DateTime
     * @JMS\Type("DateTime<'Y-m-d H:i:s'>")
     * @JMS\AccessType("public_method")
     */
    private $createdDate;

    /**
     * @var \DateTime
     * @JMS\Type("DateTime<'Y-m-d H:i:s'>")
     * @JMS\AccessType("public_method")
     */
    private $lastModificationDate;

    /**
     * @var bool
     * @JMS\Type("string")
     * @JMS\AccessType("public_method")
     * @JMS\Accessor(getter="isLabelCreated", setter="setIsLabelCreated")
     */
    private $isLabelCreated;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\AccessType("public_method")
     */
    private $carrierAccount;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\AccessType("public_method")
     */
    private $carrier;

    /**
     * @var double
     * @JMS\Type("double")
     * @JMS\AccessType("public_method")
     */
    private $weight;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\AccessType("public_method")
     */
    private $description;

    /**
     * @var bool
     * @JMS\Type("string")
     * @JMS\AccessType("public_method")
     * @JMS\Accessor(getter="isManifestCreated", setter="setIsManifestCreated")
     */
    private $isManifestCreated;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\AccessType("public_method")
     */
    private $manifestId;

    /**
     * @var double
     * @JMS\Type("double")
     * @JMS\AccessType("public_method")
     */
    private $codValue;

    /**
     * @return string
     */
    public function getEdtn()
    {
        return $this->edtn;
    }

    /**
     * @param string $edtn
     * @return $this
     */
    public function setEdtn($edtn)
    {
        $this->edtn = $edtn;
        return $this;
    }

    /**
     * @return string
     */
    public function getCtn()
    {
        return $this->ctn;
    }

    /**
     * @param string $ctn
     * @return $this
     */
    public function setCtn($ctn)
    {
        $this->ctn = $ctn;
        return $this;
    }

    /**
     * @return string
     */
    public function getExternalOrderId()
    {
        return $this->externalOrderId;
    }

    /**
     * @param string $externalOrderId
     * @return $this
     */
    public function setExternalOrderId($externalOrderId)
    {
        $this->externalOrderId = $externalOrderId;
        return $this;
    }

    /**
     * @return int
     */
    public function getCurrentStatusId()
    {
        return $this->currentStatusId;
    }

    /**
     * @param int $currentStatusId
     * @return $this
     */
    public function setCurrentStatusId($currentStatusId)
    {
        $this->currentStatusId = $currentStatusId;
        return $this;
    }

    /**
     * @return int
     */
    public function getCurrentSubStatusId()
    {
        return $this->currentSubStatusId;
    }

    /**
     * @param int $currentSubStatusId
     * @return $this
     */
    public function setCurrentSubStatusId($currentSubStatusId)
    {
        $this->currentSubStatusId = $currentSubStatusId;
        return $this;
    }

    /**
     * @return string
     */
    public function getCurrentStatusName()
    {
        return $this->currentStatusName;
    }

    /**
     * @param string $currentStatusName
     * @return $this
     */
    public function setCurrentStatusName($currentStatusName)
    {
        $this->currentStatusName = $currentStatusName;
        return $this;
    }

    /**
     * @return string
     */
    public function getCurrentSubStatusName()
    {
        return $this->currentSubStatusName;
    }

    /**
     * @param string $currentSubStatusName
     * @return $this
     */
    public function setCurrentSubStatusName($currentSubStatusName)
    {
        $this->currentSubStatusName = $currentSubStatusName;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isDeleted()
    {
        return $this->isDeleted;
    }

    /**
     * @param boolean $isDeleted
     * @return $this
     */
    public function setIsDeleted($isDeleted)
    {
        $this->isDeleted = filter_var($isDeleted, FILTER_VALIDATE_BOOLEAN);

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    /**
     * @param \DateTime $createdDate
     * @return $this
     */
    public function setCreatedDate(\DateTime $createdDate)
    {
        $this->createdDate = $createdDate;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getLastModificationDate()
    {
        return $this->lastModificationDate;
    }

    /**
     * @param \DateTime $lastModificationDate
     * @return $this
     */
    public function setLastModificationDate(\DateTime $lastModificationDate)
    {
        $this->lastModificationDate = $lastModificationDate;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isLabelCreated()
    {
        return $this->isLabelCreated;
    }

    /**
     * @param boolean $isLabelCreated
     * @return $this
     */
    public function setIsLabelCreated($isLabelCreated)
    {
        $this->isLabelCreated = filter_var($isLabelCreated, FILTER_VALIDATE_BOOLEAN);

        return $this;
    }

    /**
     * @return string
     */
    public function getCarrierAccount()
    {
        return $this->carrierAccount;
    }

    /**
     * @param string $carrierAccount
     * @return $this
     */
    public function setCarrierAccount($carrierAccount)
    {
        $this->carrierAccount = $carrierAccount;

        return $this;
    }

    /**
     * @return string
     */
    public function getCarrier()
    {
        return $this->carrier;
    }

    /**
     * @param string $carrier
     * @return $this
     */
    public function setCarrier($carrier)
    {
        $this->carrier = $carrier;

        return $this;
    }

    /**
     * @return float
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param float $weight
     * @return $this
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isManifestCreated()
    {
        return $this->isManifestCreated;
    }

    /**
     * @param boolean $isManifestCreated
     * @return $this
     */
    public function setIsManifestCreated($isManifestCreated)
    {
        $this->isManifestCreated = filter_var($isManifestCreated, FILTER_VALIDATE_BOOLEAN);

        return $this;
    }

    /**
     * @return string
     */
    public function getManifestId()
    {
        return $this->manifestId;
    }

    /**
     * @param string $manifestId
     * @return $this
     */
    public function setManifestId($manifestId)
    {
        $this->manifestId = $manifestId;

        return $this;
    }

    /**
     * @return float
     */
    public function getCodValue()
    {
        return $this->codValue;
    }

    /**
     * @param float $codValue
     * @return $this
     */
    public function setCodValue($codValue)
    {
        $this->codValue = $codValue;

        return $this;
    }
}
