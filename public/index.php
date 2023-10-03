<?php
date_default_timezone_set('Asia/Dhaka');
session_start();

const BASE_DIR =  __DIR__ . '/../';

require BASE_DIR . 'vendor/autoload.php';
require BASE_DIR . 'Core/functions.php';


use Core\Router;
use Core\Session;


$myRouter = new Router;

require BASE_DIR . 'Core/routes.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

$myRouter->router($uri, $method);



Session::unflash();
