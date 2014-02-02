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
            // [/contact]
            'contact' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/contact',
                    'defaults' => array(
                        'controller' => 'contact_controller_contact',
                        'action' => 'contact'
                    )
                )
            ),
            // [/thankyou]
            'contact_route_thankyou' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/thankyou',
                    'defaults' => array(
                        'controller' => 'contact_controller_contact',
                        'action' => 'thankyou'
                    )
                )
            ),
        )
    ),
    // ciew_manager
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view'
        )
    )
);