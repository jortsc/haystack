<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'Frontend\Controller\Home' => 'Frontend\Controller\HomeController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'frontend' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/home[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    //Accion por defecto
                    'defaults' => array(
                        'controller' => 'Frontend\Controller\Home',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),
    //Zona de las vistas mappeando el dir donde se encuentran
    'view_manager' => array(
        'template_path_stack' => array(
            'frontend' => __DIR__ . '/../view',
        ),
    ),
);