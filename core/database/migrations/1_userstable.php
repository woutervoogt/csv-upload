<?php

return [
    'table_name' => 'users',

    'drop_scheme' => "SET foreign_key_checks = 0;
    DROP TABLE IF EXISTS users",

    'scheme' => 'CREATE TABLE IF NOT EXISTS users (
        id int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
        name varchar(80) NOT NULL,
        email varchar(255) NOT NULL UNIQUE,
        password varchar(255) NOT NULL,
        created timestamp,
        updated timestamp DEFAULT CURRENT_TIMESTAMP,
        deleted timestamp NULL
    ) ENGINE=INNODB  DEFAULT CHARSET=latin1;',

    'seeder' => [
        'type' => 'array',
        'data' => array([
            'name' => 'admin',
            'email'      => 'admin@test',
            'password'   => password_hash('admin1', PASSWORD_DEFAULT),
            'created'    => date('Y-m-d H:i:s'),
        ],
    ),
    ],
];
