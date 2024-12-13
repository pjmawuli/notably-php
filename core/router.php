<?php

use core\Response;

$routes = require base_path('routes.php');
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

function abort($response_code = Response::NOT_FOUND)
{
    require base_path("controllers/{$response_code}.php");
    die();
}

function routeToControllers($uri, $routes)
{
    if (array_key_exists($uri, $routes)) {
        require base_path($routes[$uri]);
    } else {
        abort();
    }
}
routeToControllers($uri, $routes);
