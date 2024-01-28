<?php

require __DIR__ . '/../vendor/autoload.php';
require '../helpers.php';

use Framework\Router;

// Instatiating the router
$router = new Router();

// Getting routes
$routes = require(basePath('routes.php'));

// Get current URI and HTTP method
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Route the request
$router->route($uri);
