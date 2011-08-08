<?php

namespace Zenstruck\Bundle\CMSBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

use Zenstruck\Bundle\CMSBundle\Listener\Form\FormListener;

class NodeBaseFormType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('title');
        $builder->add('primary_path', 'zenstruck_cms_path');

        $builder->addEventSubscriber(new FormListener());
    }

    public function getName()
    {
        return 'zenstruck_cms_node_base';
    }
    
}