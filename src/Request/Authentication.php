<?php

namespace Sheepla\Request;

use JMS\Serializer\Annotation as JMS;

class Authentication
{
    /**
     * @JMS\Type("string")
     */
    protected $apiKey;

    /**
     * @param string $apiKey
     */
    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * @return mixed
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }
}
