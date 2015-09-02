<?php

namespace Cogitoweb\SonataMenuExtensionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('CogitowebSonataMenuExtensionBundle:Default:index.html.twig', array('name' => $name));
    }
}
