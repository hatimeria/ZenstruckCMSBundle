<?php

namespace Zenstruck\Bundle\CMSBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Zenstruck\Bundle\CMSBundle\Validator as CMSAssert;

use Doctrine\ORM\Mapping as ORM;

/**
 * @author Kevin Bond <kevinbond@gmail.com>
 *
 * @CMSAssert\PathUnique()
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="content_type", type="string", length=50)
 * @ORM\Entity(repositoryClass="Zenstruck\Bundle\CMSBundle\Repository\NodeRepository")
 * @ORM\Table(name="zenstruck_cms_node")
 */
class Node extends Entity
{
    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string")
     */
    protected $title;

    /**
     * @ORM\OneToOne(targetEntity="Path", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="path_id", referencedColumnName="id", nullable=true)
     */
    protected $primaryPath;

    protected $oldPrimaryPath;

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Set primaryPath
     *
     * @param Zenstruck\Bundle\CMSBundle\Entity\Path $primaryPath
     */
    public function setPrimaryPath(Path $primaryPath)
    {
        $this->primaryPath = $primaryPath;
    }

    /**
     * Get primaryPath
     *
     * @return Zenstruck\Bundle\CMSBundle\Entity\Path $primaryPath
     */
    public function getPrimaryPath()
    {
        return $this->primaryPath;
    }

    public function getOldPrimaryPath()
    {
        return $this->oldPrimaryPath;
    }

    public function setOldPrimaryPath($oldPrimaryPath)
    {
        $this->oldPrimaryPath = $oldPrimaryPath;
    }

}