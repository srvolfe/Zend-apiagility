<?php
namespace Pets;

use Pets\Service\PessoaService;
use Pets\Service\PetService;

return [
    'service_manager' => [
      'factories' => [
          'PessoaService' => function ($em){
            $db = $em->get('Doctrine\ORM\EntityManager');

            return new PessoaService($db);
          },
          'PetService' => function ($em){
              $db = $em->get('Doctrine\ORM\EntityManager');

              return new PetService($db);
          }

      ]
    ],
    'doctrine' => [
        'driver' => [
            'pets_entities' => [
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => [__DIR__ . '/../src/Entity']
            ],
            'orm_default' => [
                'drivers' => [
                    'Pets\Entity' => 'pets_entities'
                ]
            ]
        ]
    ]
];