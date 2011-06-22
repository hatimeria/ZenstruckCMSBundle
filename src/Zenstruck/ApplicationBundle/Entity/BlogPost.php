<?php

namespace Zenstruck\ApplicationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @author Kevin Bond <kevinbond@gmail.com>
 *
 * @ORM\Entity
 * @ORM\Table(name="blog_post")
 */
class BlogPost extends Page
{
    /**
     * @ORM\Column(type="string", nullable=true)
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
