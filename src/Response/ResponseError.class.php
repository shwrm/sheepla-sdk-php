<?php

namespace Sheepla\Response;

use JMS\Serializer\Annotation as JMS;

class ResponseError
{
    /**
     * @JMS\AccessType("public_method")
     * @JMS\Accessor(getter="getCode", setter="setCode")
     * @JMS\Type("string")
     * @JMS\XmlAttribute()
     */
    private $code;

    /**
     * @JMS\AccessType("public_method")
     * @JMS\Accessor(getter="getMessage", setter="setMessage")
     * @JMS\Type("string")
     * @JMS\XmlValue()
     */
    private $message;

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
     * @return ResponseError
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set message
     *
     * @param string $message
     * @return ResponseError
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }
}
