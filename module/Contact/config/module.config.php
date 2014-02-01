<?php

return array(
    // controllers
    'controllers' => array(
        'invokables' => array(
            'contact_controller_contact' => 'Contact\Controller\ContactController'
        )
    ),
    // routes
    'router' => array(
        'routes' => array(
            'contact' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/contact',
                    'defaults' => array(
                        'controller' => 'contact_controller_contact',
                        'action' => 'contact'
                    )
                )
            )
        )
    ),
    // ciew_manager
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view'
        )
    )
);