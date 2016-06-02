<?php

namespace Sheepla\Response;

use JMS\Serializer\Annotation as JMS;

abstract class AbstractResponse
{
    /**
     * @JMS\AccessType("public_method")
     * @JMS\Accessor(getter="getPops", setter="setPops")
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
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
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
        return (bool)count($this->getErrors());
    }
}
