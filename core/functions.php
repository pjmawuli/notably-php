<?php

use core\Response;

// die and dump
function dd($value)
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    die();
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);
    require base_path('views/') . $path;
}

function urlIs($path)
{
    if ($path === $_SERVER['REQUEST_URI']) {
        return true;
    } else {
        return false;
    }
}

function authorize($condition, $status = Response::FORBIDDEN)
{
    if (!$condition) {
        abort(Response::FORBIDDEN);
    }
}
