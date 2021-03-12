<?php

use App\Core\Database\MigrateDatabase;

define('DOCROOT', __DIR__);

require 'vendor/autoload.php';
require 'core/bootstrap.php';

MigrateDatabase::migrate(array_search('-f', $argv) !== false, array_search('-s', $argv) !== false);
