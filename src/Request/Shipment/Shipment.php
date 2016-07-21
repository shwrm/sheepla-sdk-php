<?php

namespace Sheepla\Request\Shipment;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\ExclusionPolicy("none")
 */
class Shipment
{
    /**
     * @JMS\AccessType("public_method")
     * @JMS\XmlElement(cdata = false)
     */
    private $id;

    /**
     * @JMS\Exclude()
     * @JMS\AccessType("public_method")
     * @JMS\Type("Sheepla\Request\Shipment\Sender")
     */
    private $sender;

    /**
     * @JMS\AccessType("public_method")
     * @JMS\Type("Sheepla\Request\Shipment\Recipient")
     */
    private $recipient;

    /**
     * @JMS\AccessType("public_method")
     * @JMS\XmlElement(cdata = false)
     */
    private $carrierAccount;

    /**
     * @JMS\AccessType("public_method")
     * @JMS\Type("Sheepla\Request\Shipment\Service\Service")
     */
    private $service;

    /**
     * @JMS\AccessType("public_method")
     * @JMS\XmlElement(cdata = false)
     */
    private $description;

    /**
     * @JMS\AccessType("public_method")
     * @JMS\XmlElement(cdata = false)
     */
    private $confirmAfterCreate;

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
     * Get sender
     *
     * @return \Sheepla\Request\Shipment\Sender
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * Set sender
     *
     * @param \Sheepla\Request\Shipment\Sender $sender
     * @return Shipment
     */
    public function setSender(\Sheepla\Request\Shipment\Sender $sender)
    {
        $this->sender = $sender;
        return $this;
    }

    /**
     * Get recipient
     *
     * @return \Sheepla\Request\Shipment\Recipient
     */
    public function getRecipient()
    {
        return $this->recipient;
    }

    /**
     * Set recipient
     *
     * @param \Sheepla\Request\Shipment\Recipient $recipient
     * @return Shipment
     */
    public function setRecipient(\Sheepla\Request\Shipment\Recipient $recipient)
    {
        $this->recipient = $recipient;
        return $this;
    }

    /**
     * Get carrierAccount
     *
     * @return string
     */
    public function getCarrierAccount()
    {
        return $this->carrierAccount;
    }

    /**
     * Set carrierAccount
     *
     * @param string $carrierAccount
     * @return Shipment
     */
    public function setCarrierAccount($carrierAccount)
    {
        $this->carrierAccount = $carrierAccount;
        return $this;
    }

    /**
     * Get service
     *
     * @return \Sheepla\Request\Shipment\Service\Service
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * Set service
     *
     * @param \Sheepla\Request\Shipment\Service\Service $service
     * @return Shipment
     */
    public function setService(\Sheepla\Request\Shipment\Service\Service $service)
    {
        $this->service = $service;
        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Shipment
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Get confirmAfterCreate
     *
     * @return bool
     */
    public function getConfirmAfterCreate()
    {
        return $this->confirmAfterCreate;
    }

    /**
     * Set confirmAfterCreate
     *
     * @param bool $confirmAfterCreate
     * @return Shipment
     */
    public function setConfirmAfterCreate($confirmAfterCreate)
    {
        $this->confirmAfterCreate = $confirmAfterCreate;
        return $this;
    }
}