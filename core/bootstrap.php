<?php

require 'vendor/autoload.php';
require 'core/helperfunctions.php';

session_start();

$dotenv = Dotenv\Dotenv::createImmutable(DOCROOT);
$dotenv->load();
