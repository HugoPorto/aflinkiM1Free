<?php

use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::defaultRouteClass(DashedRoute::class);

Router::scope('/', function (RouteBuilder $routes) {
    $routes->extensions(['json']);
    $routes->resources('Users');
    $routes->connect('/', ['controller' => 'Homes', 'action' => 'site']);
    $routes->connect('/store', ['controller' => 'Homes', 'action' => 'site']);
    $routes->connect('/login', ['controller' => 'Users', 'action' => 'login', 'login']);
    $routes->connect('/terms', ['controller' => 'Users', 'action' => 'terms']);
    $routes->connect('/admin', ['controller' => 'Users', 'action' => 'mainmenu']);
    $routes->connect('/pay', ['controller' => 'Payment', 'action' => 'pay']);
    $routes->connect('/payment', ['controller' => 'Payment', 'action' => 'payment']);
    $routes->connect('/error', ['controller' => 'Pages', 'action' => 'error']);
    $routes->connect('/configs', ['controller' => 'Configs', 'action' => 'view']);
    $routes->connect('/configs/add', ['controller' => 'Configs', 'action' => 'view']);
    $routes->fallbacks(DashedRoute::class);
});

Plugin::routes();
