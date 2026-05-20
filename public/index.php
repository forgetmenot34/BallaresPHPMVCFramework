<?php

require "../vendor/autoload.php";

use Core\Http\Router;

$router = new Router();

require "../routes/web.php";

$router->dispatch(
    $_SERVER['REQUEST_URI'],
    $_SERVER['REQUEST_METHOD']
);