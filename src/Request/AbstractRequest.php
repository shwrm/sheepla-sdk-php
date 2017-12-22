<?php

namespace Sheepla\Request;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\XmlNamespace(uri="http://www.sheepla.pl/webapi/1_0")
 */
abstract class AbstractRequest
{
    /**
     * @JMS\Type("Sheepla\Request\Authentication")
     */
    protected $authentication;

    /**
     * AbstractRequest constructor.
     * @param string $apiKey
     */
    public function __construct($apiKey)
    {
        $this->authentication = new Authentication($apiKey);
    }

    /**
     * Get authentication
     *
     * @return Authentication
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
