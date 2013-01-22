<?php 
namespace Usuario\Controller;

use \Zend\ServiceManager\FactoryInterface;
use \Zend\ServiceManager\ServiceLocatorInterface;
 
class ControllerFactoryUsuario implements FactoryInterface
{
    
    
    public function createService(ServiceLocatorInterface $serviceLocator) {
        /* @var $serviceLocator \Zend\Mvc\Controller\ControllerManager */
        $sm   = $serviceLocator->getServiceLocator();
        $controller = new \Usuario\Controller\Usuario($sm->get('Auth'));
        var_dump($sm->get('Auth')); die('lalalala');
        return $controller;
    }
    
}