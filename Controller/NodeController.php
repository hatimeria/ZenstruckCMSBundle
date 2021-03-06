<?php

namespace Zenstruck\Bundle\CMSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class NodeController extends Controller
{
    public function showAction($id)
    {
        $node = $this->getDoctrine()->getEntityManager()->find('ZenstruckCMSBundle:Node', $id);

        if (!$node) {
            throw $this->createNotFoundException('Node Not Found');
        }
        
        $templating = $this->get('templating');

        $template = 'ZenstruckCMSBundle:CMS:'.$node->getContentType().'.html.twig';

        if ($templating->exists($template)) {
            return $this->render($template, array('node' => $node));
        } else {
            return $this->render('ZenstruckCMSBundle:CMS:node.html.twig', array('node' => $node));
        }
    }
}