<?php

namespace Sheepla\Response;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\XmlNamespace(uri="http://www.sheepla.pl/webapi/1_0")
 */
abstract class AbstractResponse
{
    /**
     * @JMS\AccessType("public_method")
     * @JMS\Type("array<Sheepla\Response\ResponseError>")
     * @JMS\XmlList(entry="error")
     */
    protected $errors;

    public function __toString()
    {
        return get_class($this);
    }

    /**
     * Get errors
     *
     * @return \Sheepla\Response\ResponseError[]
     */
    public function getErrors()
    {
        return $this->hasErrors() ? $this->errors : null;
    }

    /**
     * Set errors
     *
     * @param array $errors
     * @return AbstractResponse
     */
    public function setErrors(array $errors)
    {
        $this->errors = $errors;
        return $this;
    }

    /**
     * Check if response has errors
     *
     * @return bool
     */
    public function hasErrors()
    {
        return (bool)count($this->errors);
    }
}
