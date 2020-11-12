<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ERROR);

define(HOST, 'localhost');
define(BANCO, 'api');
define(USER, 'campos');
define(SENHA, '@lpha2019');

define(DS, DIRECTORY_SEPARATOR);
define(DIR_APP, '/var/www/html/api-rest-php');

if (file_exists('autoload.php')){
    include 'autoload.php';
} else {
    echo 'Erro ao incluir bootstrap';exit;
}