<?php

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

define('BASEDIR', dirname(__FILE__, 2));
define('VIEWS', BASEDIR . '/App/View/modules/');
define('UPLOADS', BASEDIR . '/App/View/Uploads/');
define('PATH_VIEW', dirname(__FILE__, 2) . '/App/View/');
define('CONTROLLER', BASEDIR . '/App/Controller/');

$_ENV['db']['host'] = $_ENV['DB_HOST'];
$_ENV['db']['user'] = $_ENV['DB_USER'];
$_ENV['db']['pass'] = $_ENV['DB_PASS'];
$_ENV['db']['database'] = $_ENV['DB_DATABASE'];
