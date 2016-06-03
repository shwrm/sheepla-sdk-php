<?php

namespace Sheepla\Response\Pop;

use JMS\Serializer\Annotation as JMS;

class Pop
{
    /**
     * @JMS\AccessType("public_method")
     * @JMS\Type("string")
     * @JMS\SerializedName("Name")
     */
    private $name;

    /**
     * @JMS\AccessType("public_method")
     * @JMS\Type("integer")
     * @JMS\SerializedName("CarrierCode")
     */
    private $carrierCode;

    /**
     * @JMS\AccessType("public_method")
     * @JMS\Type("string")
     * @JMS\SerializedName("Street")
     */
    private $street;

    /**
     * @JMS\AccessType("public_method")
     * @JMS\Type("string")
     * @JMS\SerializedName("BuildingNumber")
     */
    private $buildingNumber;

    /**
     * @JMS\AccessType("public_method")
     * @JMS\Type("string")
     * @JMS\SerializedName("ZipCode")
     */
    private $zipCode;

    /**
     * @JMS\AccessType("public_method")
     * @JMS\Type("string")
     * @JMS\SerializedName("City")
     */
    private $city;

    /**
     * @JMS\AccessType("public_method")
     * @JMS\Type("string")
     * @JMS\SerializedName("Latitude")
     */
    private $latitude;

    /**
     * @JMS\AccessType("public_method")
     * @JMS\Type("string")
     * @JMS\SerializedName("Longitude")
     */
    private $longitude;

    /**
     * @JMS\AccessType("public_method")
     * @JMS\Type("boolean")
     * @JMS\SerializedName("PaymentAvailable")
     */
    private $paymentAvailable;

    /**
     * @JMS\AccessType("public_method")
     * @JMS\Type("string")
     * @JMS\SerializedName("DisplayName")
     */
    private $displayName;

    /**
     * @JMS\AccessType("public_method")
     * @JMS\Type("string")
     * @JMS\SerializedName("Description")
     */
    private $description;

    /**
     * @JMS\AccessType("public_method")
     * @JMS\Type("string")
     * @JMS\SerializedName("WorkingHours")
     */
    private $workingHours;

    /**
     * @JMS\AccessType("public_method")
     * @JMS\Type("string")
     * @JMS\SerializedName("PhotoLink")
     */
    private $photoLink;

    /**
     * @JMS\AccessType("public_method")
     * @JMS\Type("boolean")
     * @JMS\SerializedName("IsPop")
     */
    private $isPop;

    /**
     * @JMS\AccessType("public_method")
     * @JMS\Type("boolean")
     * @JMS\SerializedName("Is24h")
     */
    private $is24h;

    /**
     * Sanitize string
     *
     * @param string $value
     * @return string
     */
    private function sanitizeString($value) {
        return str_replace('  ', ' ', trim($value));
    }

    /**
     * @JMS\PostDeserialize()
     */
    private function postDeserialize() {
        // get methods with prefix "set"
        $methods = preg_grep('/^set/', get_class_methods($this));
        foreach ($methods as $method) {
            $getter = 'get' . str_replace('set', '', $method);
            if (method_exists($this, $getter)) {
                $value = $this->{$getter}();
                if (is_array($value)) continue;

                $sanitizedValue = $this->sanitizeString($value);
                $this->{$method}($sanitizedValue);
            }
        }
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Pop
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get carrierCode
     *
     * @return string
     */
    public function getCarrierCode()
    {
        return $this->carrierCode;
    }

    /**
     * Set carrierCode
     *
     * @param string $carrierCode
     * @return Pop
     */
    public function setCarrierCode($carrierCode)
    {
        $this->carrierCode = $carrierCode;
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
     * @return Pop
     */
    public function setStreet($street)
    {
        $this->street = $street;
        return $this;
    }

    /**
     * Get buildingNumber
     *
     * @return string
     */
    public function getBuildingNumber()
    {
        return $this->buildingNumber;
    }

    /**
     * Set buildingNumber
     *
     * @param string $buildingNumber
     * @return Pop
     */
    public function setBuildingNumber($buildingNumber)
    {
        $this->buildingNumber = $buildingNumber;
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
     * @return Pop
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
     * @return Pop
     */
    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    /**
     * Get latitude
     *
     * @return string
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set latitude
     *
     * @param string $latitude
     * @return Pop
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
        return $this;
    }

    /**
     * Get longitude
     *
     * @return string
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set longitude
     *
     * @param string $longitude
     * @return Pop
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
        return $this;
    }

    /**
     * Get paymentAvailable
     *
     * @return bool
     */
    public function getPaymentAvailable()
    {
        return $this->paymentAvailable;
    }

    /**
     * Set paymentAvailable
     *
     * @param bool $paymentAvailable
     * @return Pop
     */
    public function setPaymentAvailable($paymentAvailable)
    {
        $this->paymentAvailable = $paymentAvailable;
        return $this;
    }

    /**
     * Get displayName
     *
     * @return string
     */
    public function getDisplayName()
    {
        return $this->displayName;
    }

    /**
     * Set displayName
     *
     * @param string $displayName
     * @return Pop
     */
    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;
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
     * @return Pop
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Get workingHours
     *
     * @return string
     */
    public function getWorkingHours()
    {
        return $this->workingHours;
    }

    /**
     * Set workingHours
     *
     * @param string $workingHours
     * @return Pop
     */
    public function setWorkingHours($workingHours)
    {
        $this->workingHours = $workingHours;
        return $this;
    }

    /**
     * Get photoLink
     *
     * @return string
     */
    public function getPhotoLink()
    {
        return $this->photoLink;
    }

    /**
     * Set photoLink
     *
     * @param string $photoLink
     * @return Pop
     */
    public function setPhotoLink($photoLink)
    {
        $this->photoLink = $photoLink;
        return $this;
    }

    /**
     * Get isPop
     *
     * @return bool
     */
    public function getIsPop()
    {
        return $this->isPop;
    }

    /**
     * Set isPop
     *
     * @param bool $isPop
     * @return Pop
     */
    public function setIsPop($isPop)
    {
        $this->isPop = $isPop;
        return $this;
    }

    /**
     * Get is24h
     *
     * @return bool
     */
    public function getIs24h()
    {
        return $this->is24h;
    }

    /**
     * Set is24h
     *
     * @param bool $is24h
     * @return Pop
     */
    public function setIs24h($is24h)
    {
        $this->is24h = $is24h;
        return $this;
    }
}
