<?php

return [
    'gii' => [
        'class' => 'system.gii.GiiModule',
        'password' => '123456',
        'ipFilters' => ['127.0.0.1', '::1'],
    ],
    'patrimonio' => [
        'defaultController' => 'principal'
    ],
    'inventario' => [
        'defaultController' => 'principal'
    ],
    'mantenimiento' => [
        'defaultController' => 'altas'
    ],
    'gerencias' => [
        'defaultController' => 'gerencias'
    ],
    'sistema' => [
        'defaultController' => 'error'
    ],
    'cuenta' => [
        'defaultController' => 'login'
    ],
    'map' => [
        'defaultController' => 'principal'
    ]
];
