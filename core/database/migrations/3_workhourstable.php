<?php

return [
    'table_name' => 'workhours',

    'drop_scheme' => "SET foreign_key_checks = 0;
    DROP TABLE IF EXISTS workhours",

    'scheme' => 'CREATE TABLE IF NOT EXISTS workhours (
        id int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
        user_id int UNSIGNED NOT NULL,
        file_id int UNSIGNED NOT NULL,
        boekjaar varchar(255) NOT NULL,
        week varchar(255) NOT NULL,
        datum varchar(255) NOT NULL,
        persnr varchar(255) NOT NULL,
        uren varchar(255) NOT NULL,
        uurcode varchar(255) NOT NULL,
        created timestamp,
        updated timestamp DEFAULT CURRENT_TIMESTAMP,
        deleted timestamp,
        FOREIGN KEY(user_id) REFERENCES users(id),
        FOREIGN KEY(file_id) REFERENCES files(id)
    ) ENGINE=INNODB  DEFAULT CHARSET=latin1;'
];
