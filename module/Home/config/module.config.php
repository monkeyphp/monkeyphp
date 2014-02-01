<?php

return array(
    // controllers
    'controllers' => array(
        'invokables' => array(
            'home_controller_home' => 'Home\Controller\HomeController',
        )
    ),
    // routes
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/',
                    'defaults' => array(
                        'controller' => 'home_controller_home',
                        'action'     => 'home'
                    )
                ),
            ),
            'header' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/header',
                    'defaults' => array(
                        'controller' => 'home_controller_home',
                        'action'     => 'header'
                    )
                ),
            ),
            'footer' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/footer',
                    'defaults' => array(
                        'controller' => 'home_controller_home',
                        'action' => 'footer'
                    ),
                ),
                
            ),
        )
    ),
    // view manager
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);