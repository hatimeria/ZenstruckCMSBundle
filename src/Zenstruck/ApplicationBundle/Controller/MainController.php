<?php

namespace Zenstruck\ApplicationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{
    public function indexAction()
    {
        return $this->render('ApplicationBundle:Main:index.html.twig');
    }
}
