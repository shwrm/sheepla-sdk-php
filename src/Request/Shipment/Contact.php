<?php

namespace Sheepla\Request\Shipment;

use JMS\Serializer\Annotation as JMS;

class Contact
{
    /**
     * @JMS\AccessType("public_method")
     * @JMS\XmlElement(cdata = false)
     */
    private $firstName;

    /**
     * @JMS\AccessType("public_method")
     * @JMS\XmlElement(cdata = false)
     */
    private $lastName;

    /**
     * @JMS\AccessType("public_method")
     * @JMS\XmlElement(cdata = false)
     */
    private $phone;

    /**
     * @JMS\AccessType("public_method")
     * @JMS\XmlElement(cdata = false)
     */
    private $email;

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     * @return Contact
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return Contact
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return Contact
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Contact
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }
}