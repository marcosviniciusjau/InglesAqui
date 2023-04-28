<?php

define('BASEDIR', dirname(__FILE__, 2));
define('VIEWS', BASEDIR . '/App/View/modules/');
define('UPLOADS', BASEDIR . '/App/View/Uploads/');
define('PATH_VIEW', dirname(__FILE__, 2) . '/App/View/');

$_ENV['db']['host'] = 'localhost:3306';
$_ENV['db']['user'] = 'root';
$_ENV['db']['pass'] = 'etecjau';
$_ENV['db']['database'] = 'ingles_aqui';
