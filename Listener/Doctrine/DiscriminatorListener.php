<?php

namespace Zenstruck\Bundle\CMSBundle\Listener\Doctrine;

use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Events;
use Doctrine\ORM\Event\LoadClassMetadataEventArgs;


/**
 * @author Kevin Bond <kevinbond@gmail.com>
 */
class DiscriminatorListener implements EventSubscriber
{
    protected $contentTypes;


    public function __construct($contentTypes)
    {        
        $this->contentTypes = $contentTypes;
    }


    public function getSubscribedEvents() 
    {  
        return array(Events::loadClassMetadata);
    }  
    
    public function loadClassMetadata(LoadClassMetadataEventArgs $eventArgs)
    {
        $classMetadata = $eventArgs->getClassMetadata();

        // add subclasses to node
        $subclasses = array_flip($this->contentTypes);

        if ($classMetadata->name == $subclasses['node']) {
            unset($subclasses['node']);
            $classMetadata->subClasses = $subclasses;
        }

        // check if class is defined in config
        if (isset($this->contentTypes[$classMetadata->name]))
        {
            // set discriminator
            $classMetadata->discriminatorMap = array_flip($this->contentTypes);
            $classMetadata->discriminatorValue = $this->contentTypes[$classMetadata->name];
        }
    }
    
}
