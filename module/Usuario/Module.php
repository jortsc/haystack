<?php
namespace Usuario;

use Usuario\Model\Usuario;
use Usuario\Model\UsuarioTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Sql;
use \Zend\Mvc\Controller\ControllerManager;

class Module
{
    
    public function onBootstrap($e)
    {
        $eventManager = $e->getApplication()->getEventManager();
        $eventManager->attach("dispatch", function($e) {
          // echo "Dispatch!";
        });
       $e->getTarget()->getEventManager()->attach('dispatch', array($this, 'preDispatch'), 100);
    }
    
      public function preDispatch()
        {
         //do something
        }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getControllerConfig()
    {
        return array(
            'factories' => array(

                'Usuario\Controller\Usuario'   => function(ControllerManager $cm) {
                    $sm   = $cm->getServiceLocator();
                    $controller = new \Usuario\Controller\UsuarioController(($sm->get('Usuario\Model\Auth')));
                    return $controller;
                },
            ),
        );
    }

    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'Usuario\Model\UsuarioTable' =>  function($sm) {
                    $tableGateway = $sm->get('UsuarioTableGateway');
                    $table = new UsuarioTable($tableGateway);
                    return $table;
                },
                'UsuarioTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Usuario());
                    return new TableGateway('usuario', $dbAdapter, null, $resultSetPrototype);
                },
                'Usuario\Model\UsuarioRolSQL' =>  function($sm) {
                    $userRol = new Model\UsuarioRolSQL(new Sql($sm->get('Zend\Db\Adapter\Adapter')));
                    return $userRol;
                },
                'Usuario\Model\Auth' =>  function($sm) {
                    $auth = new Model\Auth($sm->get('Zend\Db\Adapter\Adapter'));
                    return $auth;
                },             
            ),           
        );
    }
}