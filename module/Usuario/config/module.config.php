<?php
/*
 * ROUTING
 * La informacion de configuracion se pasa a los componentes pertinentes del ServiceManager
 * Necesitamos dos secciones inciales controllers and view_manager.
 * 
 * La seccion controladores proporciona una lista de los controladores que  provee el modulo
 * La clave del controlador debe ser unica en todos los modulos, prefijamos con el nombre del modulo
 * 
 * La seccion view_manager añadimos el directorio de las vistas para la configuracion del TemplatePathStack 
 * Eso permite que las vistas se encuentren el /view
 * 
 * El mapeo de una URL a una accion se realiza utilizando rutas que se declaran en este archivo
 * Aqui añados las rutas para las acciones del controlador Usuario
 */
//Declaramos los controlladores y sus paths
return array(
    //Controladores del modulo Album
    'controllers' => array(
        'invokables' => array(
            'Usuario\Controller\Usuario' => 'Usuario\Controller\UsuarioController',
        ),
        'factories'    => array(
            //añado la factoria del servicio creado controller factory
            'Usuario\Controller\Usuario'    => 'Usuario\Controller\ControllerFactoryUsuario',
        ),
    ),
     // Añado las rutas a las acciones del controlador registrado y 
     // las restricciones para los parametros que puedes enviarse, action y id
    'router' => array(
        'routes' => array(
            'usuario' => array(//nnombre de la ruta
                'type'    => 'segment',//tipo segmento
                /*
                 * Permite especificar marcadores de posicion en el patron de la URl
                 * que se asignara a los parametros con el nombre de la ruta buscada
                 */
                'options' => array(
                    'route'    => '/usuario[/:action][/:id]',//coincide con cualquier URL que empieza con /usuario
                    //los otros dos segmentos son opcionales el nombre de la accion y la id
                    //las restricciones nos permiten controlar que caracteres dentro de un segmento esperamos
                    //Hemos limitado el nombre de las acciones empezar por una letra y subsequencia alphanumerica
                    //La id debera ser numerica
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    //Accion por defecto
                    'defaults' => array(
                        'controller' => 'Usuario\Controller\Usuario',
                        'action'     => 'login',
                    ),
                ),
            ),
        ),
    ),
    //Zona de las vistas mappeando el dir donde se encuentran
    'view_manager' => array(
        'template_path_stack' => array(
            'usuario' => __DIR__ . '/../view',
        ),
    ),
);