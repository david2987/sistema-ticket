<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/prueba', 'Home::index');

$routes->get('/', 'AuthController::login');
$routes->get('/register', 'AuthController::register');
$routes->post('/register', 'AuthController::register');
$routes->get('/login', 'AuthController::login');
$routes->get('/profile/(:num)', 'AuthController::profile/$1');
$routes->post('/profile/(:num)', 'AuthController::profile/$1');

$routes->get('/logout', 'AuthController::logout');
$routes->post('/login', 'AuthController::login');



$routes->get('/dashboard', 'TaskController::index');


// $routes->group('tasks', ['filter' => 'auth'], function($routes) {
    // $routes->group('tasks', function($routes) {
    $routes->get('/tasks', 'TaskController::index');
    $routes->get('/tasks/create', 'TaskController::create');
    $routes->post('/tasks/create', 'TaskController::create');
    $routes->get('/tasks/view/(:num)', 'TaskController::view/$1');
    $routes->get('/tasks/edit/(:num)', 'TaskController::edit/$1');
    $routes->post('/tasks/edit/(:num)', 'TaskController::edit/$1');
    $routes->get('/tasks/delete/(:num)', 'TaskController::delete/$1');
// });