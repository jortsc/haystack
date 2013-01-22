<?php
namespace Frontend;

use Frontend\Model\DaoPublication;
use Frontend\Model\AuthorTable;
use Frontend\Model\Author;

use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Sql;


class Module
{
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
    

    public function getServiceConfig()
    {
        return array(
                'factories' => array(
                    'Frontend\Model\DaoPublication' =>  function($sm) {
                        return new DaoPublication(new Sql($sm->get('Zend\Db\Adapter\Adapter')));
                    },
                    'Author\Model\AuthorTable' =>  function($sm) {
                    $tableGateway = $sm->get('AuthorTableGateway');
                    $table = new AuthorTable($tableGateway);
                    return $table;
                    },
                    'AuthorTableGateway' => function ($sm) {
                        $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                        $hydrator           = new \Zend\Stdlib\Hydrator\ClassMethods;
                        $rowObjectPrototype = new Model\Author;
                        $resultSet          = new \Zend\Db\ResultSet\HydratingResultSet($hydrator, $rowObjectPrototype);
                        return new TableGateway('author', $dbAdapter, null, $resultSet);
                    },       
               ) );
    }
}