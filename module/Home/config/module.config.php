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
                'type' => 'Literal',
                'options' => array(
                    'route' => '/'
                ),
                'defaults' => array(
                    'controller' => 'home_controller_home',
                    'action'     => 'home'
                )
            ),
            'header' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => "/header"
                ),
                'defaults' => array(
                    'controller' => 'home_controller_home',
                    'action'     => 'header'
                )
            ),
            'footer' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/footer'
                ),
                'defaults' => array(
                    'controller' => 'home_controller_home',
                    'action' => 'footer'
                ),
            ),
        )
    ),
    // view manager
    'view_maanger' => array(
        'template_path_stack' => array(
            'home' => __DIR__ . '/../view'
        )
    )
);