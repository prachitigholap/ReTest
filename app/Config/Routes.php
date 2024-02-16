<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// Displaying entire table
$routes->get('/', 'Home::index');

$routes->get('/search', 'FormController::search');

// Search By Product Name
$routes->get('/search', 'FormController::search');
$routes->match(['get','post'], 'FormController/search', 'FormController::search');

// Search by product category
$routes->get('/categorysearch', 'FormController::categorysearch');
$routes->match(['get','post'], 'FormController/categorysearch', 'FormController::categorysearch'); 

// Search by veg-non-veg category
$routes->get('/vegnonvegsearch', 'FormController::vegnonvegsearch');
$routes->match(['get','post'], 'FormController/vegnonvegsearch', 'FormController::vegnonvegsearch');

// Search by Toppings
$routes->get('/toppingsearch', 'FormController::toppingsearch');
$routes->match(['get','post'], 'FormController/toppingsearch', 'FormController::toppingsearch');      

// dynamic data in filter
// $routes->get('/search', 'FormController::index');
// $routes->get('FormController/getProductCategories', 'FormController::getProductCategories');
// $routes->get('/search', 'FormController::filter');
// $routes->get('/search', 'FormController::index');
// $routes->get('/form', 'FormController::index');
// $routes->get('/handle-get-form', 'FormController::handleGetForm');

