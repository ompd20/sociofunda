<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;
use CodeIgniter\Router\RouteGroup;

$routes = Services::routes();

$routes->group('', ['namespace' => 'App\Controllers'], function (RouteCollection $routes) {
    $routes->get('/', 'Home::index');
});

$routes->group('api', ['namespace' => 'App\Controllers', 'filter' => 'jwt'], function (RouteGroup $routes) {
    $routes->get('home', 'Home::index');
});
