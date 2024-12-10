<?php

$routes = require 'routes.php';
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

function abort($response_code = Response::NOT_FOUND)
{
    require base_path("controllers/{$response_code}.php");
}

function routeToControllers($uri, $routes)
{
    if (array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {
        abort();
    }
}
routeToControllers($uri, $routes);
