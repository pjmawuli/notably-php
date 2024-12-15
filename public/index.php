<?php

use core\Router;

const BASE_PATH = __DIR__ . '/../';
require BASE_PATH . 'core/functions.php';

// now we can automatically load our core classes when we instantiate them
spl_autoload_register(function ($class) {
    // core\Database
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    require base_path("{$class}.php");
});

$router = new Router();

$uri = parse_url($_SERVER['REQUEST_URI'])['path']; // the current uri
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD']; // the request method

$routes = require base_path('routes.php');
$router->route($uri, $method);
