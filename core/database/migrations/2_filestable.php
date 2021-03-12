<?php

return [
    'table_name' => 'files',

    'drop_scheme' => "SET foreign_key_checks = 0;
    DROP TABLE IF EXISTS files",

    'scheme' => 'CREATE TABLE IF NOT EXISTS files (
        id int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
        user_id int UNSIGNED NOT NULL,
        name varchar(255) NOT NULL,
        created timestamp,
        updated timestamp DEFAULT CURRENT_TIMESTAMP,
        deleted timestamp,
        FOREIGN KEY(user_id) REFERENCES users(id)
    ) ENGINE=INNODB  DEFAULT CHARSET=latin1;'
];
