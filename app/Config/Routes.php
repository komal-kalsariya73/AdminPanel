<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/admin', 'AdminController::index');
$routes->get('/customer/view', 'Customer::index');
$routes->get('/customer/create', 'Customer::create');
$routes->post('/customer/insert', 'Customer::insert');

$routes->get('/product/create', 'Product::create');
$routes->get('/product/view', 'Product::index');
$routes->get('/category/create', 'category::create');
$routes->get('/order/create', 'order::create');
$routes->get('/order/view', 'order::index');