<?php

namespace Zenstruck\Bundle\CMSBundle\Listener\Form;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\Event\FilterDataEvent;

use Zenstruck\Bundle\CMSBundle\Entity\Node;

class FormListener implements EventSubscriberInterface
{
    public function onBindClientData(FilterDataEvent $event)
    {
        /* @var \Zenstruck\Bundle\CMSBundle\Entity\Node $node */
        $node = $event->getForm()->getClientData();

        if (is_object($node)) {
            $node->setOldPrimaryPath($node->getPrimaryPath());
        }
    }

    public static function getSubscribedEvents()
    {
        return array(
            FormEvents::BIND_CLIENT_DATA => 'onBindClientData',
        );
    }
}