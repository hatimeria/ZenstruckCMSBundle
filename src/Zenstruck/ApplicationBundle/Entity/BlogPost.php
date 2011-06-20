<?php

namespace Zenstruck\ApplicationBundle\Entity;

/**
 * @author Kevin Bond <kevinbond@gmail.com>
 * 
 * @orm:Entity
 */
class BlogPost extends Page
{
    /**
     * @orm:Column(type="string", nullable=true)
     */ 
    protected $tags;
    
    public function getTags()     
    {
        return $this->tags;
    }

    public function setTags($tags)
    {
        $this->tags = $tags;
    }


}
