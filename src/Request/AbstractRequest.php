<?php

namespace Sheepla\Request;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\XmlNamespace(uri="http://www.sheepla.pl/webapi/1_0")
 */
abstract class AbstractRequest
{
    /**
     * @JMS\XmlElement(cdata = false)
     * @JMS\Accessor(getter="getAuthentication")
     * @JMS\XmlKeyValuePairs
     * @JMS\Type("array<string, string>")
     */
    protected $authentication = ['apiKey' => null];

    /**
     * AbstractRequest constructor.
     * @param string $apiKey
     */
    public function __construct($apiKey)
    {
        $this->authentication['apiKey'] = $apiKey;
    }

    /**
     * Get authentication
     *
     * @return array
     */
    public function getAuthentication()
    {
        return $this->authentication;
    }

    /**
     * Get request method
     *
     * @return string
     */
    abstract public function getRequestMethod();
}
