<?php
return [
    'service_manager' => [
        'factories' => [
            \PetsAPI\V1\Rest\Pessoa\PessoaResource::class => \PetsAPI\V1\Rest\Pessoa\PessoaResourceFactory::class,
            \PetsAPI\V1\Rest\Pets\PetsResource::class => \PetsAPI\V1\Rest\Pets\PetsResourceFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'pets-api.rest.pessoa' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/pessoa[/:pessoa_id]',
                    'defaults' => [
                        'controller' => 'PetsAPI\\V1\\Rest\\Pessoa\\Controller',
                    ],
                ],
            ],
            'pets-api.rest.pets' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/pets[/:pets_id]',
                    'defaults' => [
                        'controller' => 'PetsAPI\\V1\\Rest\\Pets\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'zf-versioning' => [
        'uri' => [
            0 => 'pets-api.rest.pessoa',
            1 => 'pets-api.rest.pets',
        ],
    ],
    'zf-rest' => [
        'PetsAPI\\V1\\Rest\\Pessoa\\Controller' => [
            'listener' => \PetsAPI\V1\Rest\Pessoa\PessoaResource::class,
            'route_name' => 'pets-api.rest.pessoa',
            'route_identifier_name' => 'pessoa_id',
            'collection_name' => 'pessoa',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \PetsAPI\V1\Rest\Pessoa\PessoaEntity::class,
            'collection_class' => \PetsAPI\V1\Rest\Pessoa\PessoaCollection::class,
            'service_name' => 'Pessoa',
        ],
        'PetsAPI\\V1\\Rest\\Pets\\Controller' => [
            'listener' => \PetsAPI\V1\Rest\Pets\PetsResource::class,
            'route_name' => 'pets-api.rest.pets',
            'route_identifier_name' => 'pets_id',
            'collection_name' => 'pets',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \PetsAPI\V1\Rest\Pets\PetsEntity::class,
            'collection_class' => \PetsAPI\V1\Rest\Pets\PetsCollection::class,
            'service_name' => 'Pets',
        ],
    ],
    'zf-content-negotiation' => [
        'controllers' => [
            'PetsAPI\\V1\\Rest\\Pessoa\\Controller' => 'Json',
            'PetsAPI\\V1\\Rest\\Pets\\Controller' => 'Json',
        ],
        'accept_whitelist' => [
            'PetsAPI\\V1\\Rest\\Pessoa\\Controller' => [
                0 => 'application/vnd.pets-api.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'PetsAPI\\V1\\Rest\\Pets\\Controller' => [
                0 => 'application/vnd.pets-api.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
        ],
        'content_type_whitelist' => [
            'PetsAPI\\V1\\Rest\\Pessoa\\Controller' => [
                0 => 'application/vnd.pets-api.v1+json',
                1 => 'application/json',
            ],
            'PetsAPI\\V1\\Rest\\Pets\\Controller' => [
                0 => 'application/vnd.pets-api.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'zf-hal' => [
        'metadata_map' => [
            \PetsAPI\V1\Rest\Pessoa\PessoaEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'pets-api.rest.pessoa',
                'route_identifier_name' => 'pessoa_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \PetsAPI\V1\Rest\Pessoa\PessoaCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'pets-api.rest.pessoa',
                'route_identifier_name' => 'pessoa_id',
                'is_collection' => true,
            ],
            \PetsAPI\V1\Rest\Pets\PetsEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'pets-api.rest.pets',
                'route_identifier_name' => 'pets_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \PetsAPI\V1\Rest\Pets\PetsCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'pets-api.rest.pets',
                'route_identifier_name' => 'pets_id',
                'is_collection' => true,
            ],
        ],
    ],
    'zf-content-validation' => [
        'PetsAPI\\V1\\Rest\\Pessoa\\Controller' => [
            'input_filter' => 'PetsAPI\\V1\\Rest\\Pessoa\\Validator',
        ],
        'PetsAPI\\V1\\Rest\\Pets\\Controller' => [
            'input_filter' => 'PetsAPI\\V1\\Rest\\Pets\\Validator',
        ],
    ],
    'input_filter_specs' => [
        'PetsAPI\\V1\\Rest\\Pessoa\\Validator' => [
            0 => [
                'required' => true,
                'validators' => [],
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StripTags::class,
                        'options' => [],
                    ],
                    1 => [
                        'name' => \Zend\Filter\StringTrim::class,
                        'options' => [],
                    ],
                ],
                'name' => 'nome',
            ],
            1 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'cpf',
            ],
        ],
        'PetsAPI\\V1\\Rest\\Pets\\Validator' => [
            0 => [
                'required' => true,
                'validators' => [],
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                        'options' => [],
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                        'options' => [],
                    ],
                ],
                'name' => 'nome',
            ],
            1 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'raca',
            ],
        ],
    ],
];
