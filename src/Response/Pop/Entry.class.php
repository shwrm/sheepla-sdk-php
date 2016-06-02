<?php

namespace Sheepla\Response\Pop;

use JMS\Serializer\Annotation as JMS;

class Entry
{
    /**
     * @JMS\AccessType("public_method")
     * @JMS\Accessor(getter="getName", setter="setName")
     * @JMS\Type("string")
     * @JMS\SerializedName("Name")
     */
    private $name;

    /**
     * @JMS\AccessType("public_method")
     * @JMS\Accessor(getter="getCarrierCode", setter="setCarrierCode")
     * @JMS\Type("integer")
     * @JMS\SerializedName("CarrierCode")
     */
    private $carrierCode;

    /**
     * @JMS\AccessType("public_method")
     * @JMS\Accessor(getter="getStreet", setter="setStreet")
     * @JMS\Type("string")
     * @JMS\SerializedName("Street")
     */
    private $street;

    /**
     * @JMS\AccessType("public_method")
     * @JMS\Accessor(getter="getBuildingNumber", setter="setBuildingNumber")
     * @JMS\Type("string")
     * @JMS\SerializedName("BuildingNumber")
     */
    private $buildingNumber;

    /**
     * @JMS\AccessType("public_method")
     * @JMS\Accessor(getter="getZipCode", setter="setZipCode")
     * @JMS\Type("string")
     * @JMS\SerializedName("ZipCode")
     */
    private $zipCode;

    /**
     * @JMS\AccessType("public_method")
     * @JMS\Accessor(getter="getCity", setter="setCity")
     * @JMS\Type("string")
     * @JMS\SerializedName("City")
     */
    private $city;

    /**
     * @JMS\AccessType("public_method")
     * @JMS\Accessor(getter="getLatitude", setter="setLatitude")
     * @JMS\Type("string")
     * @JMS\SerializedName("Latitude")
     */
    private $latitude;

    /**
     * @JMS\AccessType("public_method")
     * @JMS\Accessor(getter="getLongitude", setter="setLongitude")
     * @JMS\Type("string")
     * @JMS\SerializedName("Longitude")
     */
    private $longitude;

    /**
     * @JMS\AccessType("public_method")
     * @JMS\Accessor(getter="getPaymentAvailable", setter="setPaymentAvailable")
     * @JMS\Type("boolean")
     * @JMS\SerializedName("PaymentAvailable")
     */
    private $paymentAvailable;

    /**
     * @JMS\AccessType("public_method")
     * @JMS\Accessor(getter="getDisplayName", setter="setDisplayName")
     * @JMS\Type("string")
     * @JMS\SerializedName("DisplayName")
     */
    private $displayName;

    /**
     * @JMS\AccessType("public_method")
     * @JMS\Accessor(getter="getDescription", setter="setDescription")
     * @JMS\Type("string")
     * @JMS\SerializedName("Description")
     */
    private $description;

    /**
     * @JMS\AccessType("public_method")
     * @JMS\Accessor(getter="getWorkingHours", setter="setWorkingHours")
     * @JMS\Type("string")
     * @JMS\SerializedName("WorkingHours")
     */
    private $workingHours;

    /**
     * @JMS\AccessType("public_method")
     * @JMS\Accessor(getter="getPhotoLink", setter="setPhotoLink")
     * @JMS\Type("string")
     * @JMS\SerializedName("PhotoLink")
     */
    private $photoLink;

    /**
     * @JMS\AccessType("public_method")
     * @JMS\Accessor(getter="getIsPop", setter="setIsPop")
     * @JMS\Type("boolean")
     * @JMS\SerializedName("IsPop")
     */
    private $isPop;

    /**
     * @JMS\AccessType("public_method")
     * @JMS\Accessor(getter="getIs24h", setter="setIs24h")
     * @JMS\Type("boolean")
     * @JMS\SerializedName("Is24h")
     */
    private $is24h;

    /**
     * Get name
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set name
     *
     * @param mixed $name
     * @return Model
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get carrierCode
     *
     * @return mixed
     */
    public function getCarrierCode()
    {
        return $this->carrierCode;
    }

    /**
     * Set carrierCode
     *
     * @param mixed $carrierCode
     * @return Model
     */
    public function setCarrierCode($carrierCode)
    {
        $this->carrierCode = $carrierCode;

        return $this;
    }

    /**
     * Get street
     *
     * @return mixed
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set street
     *
     * @param mixed $street
     * @return Model
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Get buildingNumber
     *
     * @return mixed
     */
    public function getBuildingNumber()
    {
        return $this->buildingNumber;
    }

    /**
     * Set buildingNumber
     *
     * @param mixed $buildingNumber
     * @return Model
     */
    public function setBuildingNumber($buildingNumber)
    {
        $this->buildingNumber = $buildingNumber;

        return $this;
    }

    /**
     * Get zipCode
     *
     * @return mixed
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * Set zipCode
     *
     * @param mixed $zipCode
     * @return Model
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    /**
     * Get city
     *
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set city
     *
     * @param mixed $city
     * @return Model
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return mixed
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set latitude
     *
     * @param mixed $latitude
     * @return Model
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return mixed
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set longitude
     *
     * @param mixed $longitude
     * @return Model
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get paymentAvailable
     *
     * @return mixed
     */
    public function getPaymentAvailable()
    {
        return $this->paymentAvailable;
    }

    /**
     * Set paymentAvailable
     *
     * @param mixed $paymentAvailable
     * @return Model
     */
    public function setPaymentAvailable($paymentAvailable)
    {
        $this->paymentAvailable = $paymentAvailable;

        return $this;
    }

    /**
     * Get displayName
     *
     * @return mixed
     */
    public function getDisplayName()
    {
        return $this->displayName;
    }

    /**
     * Set displayName
     *
     * @param mixed $displayName
     * @return Model
     */
    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;

        return $this;
    }

    /**
     * Get description
     *
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set description
     *
     * @param mixed $description
     * @return Model
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get workingHours
     *
     * @return mixed
     */
    public function getWorkingHours()
    {
        return $this->workingHours;
    }

    /**
     * Set workingHours
     *
     * @param mixed $workingHours
     * @return Model
     */
    public function setWorkingHours($workingHours)
    {
        $this->workingHours = $workingHours;

        return $this;
    }

    /**
     * Get photoLink
     *
     * @return mixed
     */
    public function getPhotoLink()
    {
        return $this->photoLink;
    }

    /**
     * Set photoLink
     *
     * @param mixed $photoLink
     * @return Model
     */
    public function setPhotoLink($photoLink)
    {
        $this->photoLink = $photoLink;

        return $this;
    }

    /**
     * Get isPop
     *
     * @return mixed
     */
    public function getIsPop()
    {
        return $this->isPop;
    }

    /**
     * Set isPop
     *
     * @param mixed $isPop
     * @return Model
     */
    public function setIsPop($isPop)
    {
        $this->isPop = $isPop;

        return $this;
    }

    /**
     * Get is24h
     *
     * @return mixed
     */
    public function getIs24h()
    {
        return $this->is24h;
    }

    /**
     * Set is24h
     *
     * @param mixed $is24h
     * @return Model
     */
    public function setIs24h($is24h)
    {
        $this->is24h = $is24h;

        return $this;
    }
}