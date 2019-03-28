<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

define('ROOT', dirname(__FILE__, 2) . "/app/");

require_once ROOT . '/autoload.php';

session_start();
$router = new Router();
$router->run();
