<?php

namespace Zenstruck\ApplicationBundle\Entity;

use Zenstruck\Bundle\CMSBundle\Entity\Node;

/**
 * @author Kevin Bond <kevinbond@gmail.com>
 * 
 * @orm:Entity
 */
class Page extends Node
{
    /**
     * @orm:Column(type="text", nullable=true)
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
