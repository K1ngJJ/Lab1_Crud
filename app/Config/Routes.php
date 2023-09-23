<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

//View Home Index
$routes->get('/lab1', 'JController::jhome');

//Controller
$routes->get('/lab1/(:any)', 'JController::lab1/$1');

//Insert
$routes->post('/insert', 'JController::insert');

//Update
$routes->get('/edit/(:any)', 'JController::edit/$1');

//Delete
$routes->get('/delete/(:any)', 'JController::delete/$1');
