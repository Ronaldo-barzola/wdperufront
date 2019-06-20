<?php

return [
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'WDPERU',
    'theme' => '01',
    'defaultController' => 'principal',
    'language' => 'es',
    'sourceLanguage' => 'en',
    'timeZone' => 'America/Lima',
    'preload' => ['log'],
    'import' => [
        'application.models.*',
        'application.extensions.sftp.*',
        'application.components.*',
    ],
    'modules' => require(dirname(__FILE__) . '/modules.php'),
    'components' => [
        'urlManager' => [
            'urlFormat' => 'path',
            'showScriptName' => false,
            'rules' => [
                //Url limpia para el login
                'mapa' => 'map/principal',
//                'login' => 'cuenta/login',
//                'logout' => 'cuenta/login/logout',
//                'login/<action:\w+>' => 'cuenta/login/<action>',
//                'login/<action:\w+>/<id:\d+>' => 'cuenta/login/<action>'
            ],
        ],
        'db' => [],
        'errorHandler' => [
            'errorAction' => 'sistema/error',
        ]
    ],
    'params' => require(dirname(__FILE__) . '/params.php'),
];
