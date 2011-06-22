<?php

namespace Zenstruck\ApplicationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zenstruck\Bundle\CMSBundle\Entity\Node;

/**
 * @author Kevin Bond <kevinbond@gmail.com>
 *
 * @ORM\Entity
 */
class Page extends Node
{
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $body;

    public function getBody()
    {
        return $this->body;
    }

    public function setBody($body)
    {
        $this->body = $body;
    }


}
