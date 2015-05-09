<?php

namespace EOSUser;

return array(
    'router' => array(
        'routes' => array(
            'eosuser-auth' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/auth',
                    'defaults' => array(
                        'controller' => 'EOSUser\Controller\Auth',
                        'action' => 'index'
                    )
                )
            )
        ),
    ),
    'controllers' => array(
        'invokables' => array(
        'EOSUser\Controller\Auth' => 'EOSUser\Controller\AuthController'
        ),
    ),
    'view_manager' => array(
        'strategies' => array(
            'ViewJsonStrategy'
        )
    ),    
    'doctrine' => array(
        'driver' => array(
            __NAMESPACE__.'_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__.'/../src/'.__NAMESPACE__.'/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__.'\Entity' => __NAMESPACE__.'_driver'
                )
            )
        )
    )    
);