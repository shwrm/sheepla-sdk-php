<?php

namespace Sheepla\Response\Pop;

use JMS\Serializer\Annotation as JMS;

class Collection extends \Sheepla\Response\AbstractResponse
{
    /**
     * @JMS\AccessType("public_method")
     * @JMS\Accessor(getter="getPops", setter="setPops")
     * @JMS\Type("array<Sheepla\Response\Pop\Entry>")
     * @JMS\XmlList(entry="pop")
     */
    private $pops;

    /**
     * Get pops
     *
     * @return array
     */
    public function getPops()
    {
        return $this->pops;
    }

    /**
     * Set pops
     *
     * @param mixed $pops
     * @return Collection
     */
    public function setPops(array $pops)
    {
        $this->pops = $pops;

        return $this;
    }
}
