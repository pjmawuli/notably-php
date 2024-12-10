<?php

const BASE_PATH = __DIR__ . '/../';
require BASE_PATH . 'functions.php';

// now we can automatically load our core classes when we instantiate them
spl_autoload_register(function ($class) {
    require base_path("core/{$class}.php");
});

require base_path('router.php');
