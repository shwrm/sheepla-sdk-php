<?php

namespace Sheepla\Request\Shipment\Service;

use JMS\Serializer\Annotation as JMS;

class Param
{
    /**
     * @const string
     */
    const CODE_DESTINATION_POP = 'RuchDestinationPOP';

    /**
     * @const string
     */
    const CODE_RETURN_DESTINATION_POP = 'RuchReturnDestinationPOP';

    /**
     * @const string
     */
    const CODE_COD = 'RuchCashOnDelivery';

    /**
     * @const string[]
     */
    const CODES = [
        self::CODE_DESTINATION_POP,
        self::CODE_RETURN_DESTINATION_POP,
        self::CODE_COD,
    ];

    /**
     * @JMS\AccessType("public_method")
     * @JMS\XmlAttribute()
     * @JMS\Type("string")
     */
    private $code;

    /**
     * @JMS\AccessType("public_method")
     * @JMS\XmlAttribute()
     * @JMS\Type("string")
     */
    private $value;

    /**
     * @JMS\AccessType("public_method")
     * @JMS\XmlAttribute()
     * @JMS\Type("string")
     */
    private $currency;

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
     * @return Param
     */
    public function setCode($code)
    {
        if (false === in_array($code, self::CODES)) {
            throw new \InvalidArgumentException('Unsupported code.');
        }

        $this->code = $code;
        return $this;
    }

    /**
     * Get value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set value
     *
     * @param string $value
     * @return Param
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    /**
     * Get currency
     *
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Set currency
     *
     * @param string $currency
     * @return Param
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
        return $this;
    }
}
