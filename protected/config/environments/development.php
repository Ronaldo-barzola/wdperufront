<?php

return [
    'components' => [
        'db' => [
            'connectionString' => 'dblib:host=172.17.1.6;dbname=BDABASTECIMIENTO;MultipleActiveResultSets=false',
            'username' => 'sa_BDABASTECIMIENTO',
            'password' => '4m4nd4.2016',
            'charset' => 'utf-8'
        ],
        'pl' => [
            'class' => 'system.db.CDbConnection',
            'connectionString' => 'dblib:host=172.17.1.6;dbname=BDPAD;MultipleActiveResultSets=false',
            'username' => 'sa_BDPAD',
            'password' => '4m4nd4.2016',
            'charset' => 'utf-8'
        ],
        'mr' => [
            'class' => 'system.db.CDbConnection',
            'connectionString' => 'dblib:host=172.17.1.6;dbname=BDMASTER;MultipleActiveResultSets=false',
            'username' => 'sa_BDMASTER',
            'password' => '4m4nd4.2016',
            'charset' => 'utf-8'
        ]
    ]
];

