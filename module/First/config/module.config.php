<?php
namespace First;

use First\Service\PetService;

return [
    'service_manager' => [
      'factories' => [
          'PetService' => function ($em){
            $db = $em->get('Doctrine\ORM\EntityManager');

            return new PetService($db);
          }
      ]
    ],
    'doctrine' => [
        'driver' => [
            'first_entities' => [
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => [__DIR__ . '/../src/Entity']
            ],
            'orm_default' => [
                'drivers' => [
                    'First\Entity' => 'first_entities'
                ]
            ]
        ]
    ]
];