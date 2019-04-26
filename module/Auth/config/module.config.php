<?php
namespace Auth;

return [
    'doctrine' => [
        'driver' => [
            'auth_entities' => [
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => [__DIR__ . '/../src/Entity']
            ],
            'orm_default' => [
                'drivers' => [
                    'Auth\Entity' => 'scl_entities'
                ]
            ]
        ]
    ]
];
