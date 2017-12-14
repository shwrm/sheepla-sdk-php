<?php

namespace Sheepla\Request\Shipment;

use JMS\Serializer\Annotation as JMS;

abstract class AbstractPerson
{
    /**
     * @JMS\AccessType("public_method")
     * @JMS\XmlElement(cdata = false)
     * @JMS\Type("boolean")
     */
    protected $isCompany;

    /**
     * @JMS\AccessType("public_method")
     * @JMS\XmlElement(cdata = false)
     * @JMS\Type("string")
     */
    protected $companyName;

    /**
     * @JMS\AccessType("public_method")
     * @JMS\XmlElement(cdata = false)
     * @JMS\Type("string")
     */
    protected $taxId;

    /**
     * @JMS\AccessType("public_method")
     * @JMS\XmlElement(cdata = false)
     * @JMS\Type("string")
     */
    protected $firstName;

    /**
     * @JMS\AccessType("public_method")
     * @JMS\XmlElement(cdata = false)
     * @JMS\Type("string")
     */
    protected $lastName;

    /**
     * @JMS\AccessType("public_method")
     * @JMS\XmlElement(cdata = false)
     * @JMS\Type("string")
     */
    protected $street;

    /**
     * @JMS\AccessType("public_method")
     * @JMS\XmlElement(cdata = false)
     * @JMS\Type("string")
     */
    protected $homeNumber;

    /**
     * @JMS\AccessType("public_method")
     * @JMS\XmlElement(cdata = false)
     * @JMS\Type("string")
     */
    protected $zipCode;

    /**
     * @JMS\AccessType("public_method")
     * @JMS\XmlElement(cdata = false)
     * @JMS\Type("string")
     */
    protected $city;

    /**
     * @JMS\AccessType("public_method")
     * @JMS\XmlElement(cdata = false)
     * @JMS\Type("string")
     */
    protected $countryCode;

    /**
     * @JMS\AccessType("public_method")
     * @JMS\Type("Sheepla\Request\Shipment\Contact")
     */
    protected $contact;

    /**
     * Get isCompany
     *
     * @return bool
     */
    public function getIsCompany()
    {
        return $this->isCompany;
    }

    /**
     * Set isCompany
     *
     * @param bool $isCompany
     * @return $this
     */
    public function setIsCompany($isCompany)
    {
        $this->isCompany = $isCompany;
        return $this;
    }

    /**
     * Get companyName
     *
     * @return string
     */
    public function getCompanyName()
    {
        return $this->companyName;
    }

    /**
     * Set companyName
     *
     * @param string $companyName
     * @return $this
     */
    public function setCompanyName($companyName)
    {
        $this->companyName = $companyName;
        return $this;
    }

    /**
     * Get taxId
     *
     * @return string
     */
    public function getTaxId()
    {
        return $this->taxId;
    }

    /**
     * Set taxId
     *
     * @param string $taxId
     * @return $this
     */
    public function setTaxId($taxId)
    {
        $this->taxId = $taxId;
        return $this;
    }

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
     * @return $this
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
     * @return $this
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * Get street
     *
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set street
     *
     * @param string $street
     * @return $this
     */
    public function setStreet($street)
    {
        $this->street = $street;
        return $this;
    }

    /**
     * Get homeNumber
     *
     * @return string
     */
    public function getHomeNumber()
    {
        return $this->homeNumber;
    }

    /**
     * Set homeNumber
     *
     * @param string $homeNumber
     * @return $this
     */
    public function setHomeNumber($homeNumber)
    {
        $this->homeNumber = $homeNumber;
        return $this;
    }

    /**
     * Get zipCode
     *
     * @return string
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * Set zipCode
     *
     * @param string $zipCode
     * @return $this
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;
        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return $this
     */
    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    /**
     * Get countryCode
     *
     * @return string
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * Set countryCode
     *
     * @param string $countryCode
     * @return $this
     */
    public function setCountryCode($countryCode)
    {
        $this->countryCode = $countryCode;
        return $this;
    }

    /**
     * Get contact
     *
     * @return \Sheepla\Request\Shipment\Contact
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Set contact
     *
     * @param \Sheepla\Request\Shipment\Contact $contact
     * @return $this
     */
    public function setContact(\Sheepla\Request\Shipment\Contact $contact)
    {
        $this->contact = $contact;
        return $this;
    }

    public function getName()
    {
        return implode(" ", [
           $this->getCompanyName(),
           $this->getFirstName(),
           $this->getLastName()
        ]);
    }
}
