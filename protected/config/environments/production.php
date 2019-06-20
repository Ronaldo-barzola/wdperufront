<?php

return [
    'components' => [
        'db' => require(dirname(__FILE__) . '/../database.php'),
        'mr' => require(dirname(__FILE__) . '/../db.master.php'),
        'pl' => require(dirname(__FILE__) . '/../db.padlock.php')
    ]
];
