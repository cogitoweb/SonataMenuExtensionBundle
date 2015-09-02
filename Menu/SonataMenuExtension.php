<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Cogitoweb\SonataMenuExtensionBundle\Menu;

use Symfony\Component\Security\Core\SecurityContextInterface;

/**
 * Description of SonataMenuExtension
 *
 * @author cecilia.natale
 */
class SonataMenuExtension {
    const CONTEXT_MENU       = 'menu';
    const CONTEXT_DASHBOARD  = 'dashboard';
	
    protected $router;
    protected $securityContext;
    protected $rotta;
    protected $label;
    protected $parameters;
    protected $ruolo;
    

    public function __construct(\Symfony\Component\Routing\RouterInterface $router, SecurityContextInterface $securityContext, $rotta, $label, $parameters = array(), $ruolo = null) {
        $this->router = $router;
        $this->securityContext = $securityContext;
        $this->rotta = $rotta;
        $this->label = $label;
        $this->parameters = $parameters;
        $this->ruolo = $ruolo;
    }

    public function showIn($context)
    {
        switch ($context) {
            case self::CONTEXT_DASHBOARD:
            case self::CONTEXT_MENU:
            default:
                return true;
        }
    }

    public function isGranted($name, $object = null)
    {
        if($this->securityContext->isGranted($this->ruolo)){return true;}
        else{return false;}
    }

    public function getLabel()
    {
        return $this->label;   
    }

    public function getRoute($rotta)
    {
        return $this->rotta;
    }

    public function hasRoute($name)
    {
        return true;
    }

    public function getCode()
    {
        return $this->rotta;
    }

    public function generateUrl($rotta, array $parameters = array(), $absolute = false)
    {
        
        return $this->router->generate($this->getRoute(''), $this->parameters);
    }

    public function getTranslationDomain()
    {
        return '';
    }
}
