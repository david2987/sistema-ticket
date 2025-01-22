<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'AuthController::login');
$routes->get('/register', 'AuthController::register');
$routes->post('/register', 'AuthController::register');
$routes->get('/login', 'AuthController::login');
$routes->get('/profile/(:num)', 'AuthController::profile/$1');
$routes->post('/profile/(:num)', 'AuthController::profile/$1');
$routes->get('/logout', 'AuthController::logout');
$routes->post('/login', 'AuthController::login');







$routes->group('tasks', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'TaskController::index');
    $routes->get('create', 'TaskController::create');
    $routes->post('create', 'TaskController::create');
    $routes->get('view/(:num)', 'TaskController::view/$1');
    $routes->get('edit/(:num)', 'TaskController::edit/$1');
    $routes->post('edit/(:num)', 'TaskController::edit/$1');
    $routes->get('delete/(:num)', 'TaskController::delete/$1');
});
