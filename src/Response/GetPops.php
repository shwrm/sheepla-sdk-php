<?php

namespace Sheepla\Response;

use JMS\Serializer\Annotation as JMS;

class GetPops extends \Sheepla\Response\AbstractResponse
{
    /**
     * @JMS\AccessType("public_method")
     * @JMS\Type("array<Sheepla\Response\Pop\Pop>")
     * @JMS\XmlList(entry="pop")
     */
    private $pops;

    /**
     * Get pops
     *
     * @return \Sheepla\Response\Pop\Pop[]
     */
    public function getPops()
    {
        return $this->pops;
    }

    /**
     * Set pops
     *
     * @param array $pops
     * @return GetPops
     */
    public function setPops(array $pops)
    {
        $this->pops = $pops;
        return $this;
    }
}
