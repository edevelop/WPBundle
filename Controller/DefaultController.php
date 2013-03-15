<?php

namespace TLB\WPBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('TLBWPBundle:Default:index.html.twig', array('name' => $name));
    }
}
