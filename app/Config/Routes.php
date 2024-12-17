<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/admin', 'AdminController::index');
$routes->get('/customer/view', 'Customer::index');
$routes->get('/customer/create', 'Customer::create');
$routes->post('/customer/insert', 'Customer::insert');
$routes->get('customer/getCustomers', 'Customer::getCustomers');
$routes->post('customer/delete/(:num)', 'Customer::delete/$1');  
$routes->get('/customer/fetchCustomer/(:num)', 'Customer::fetchCustomer/$1');
$routes->post('/customer/update', 'Customer::update');
$routes->get('customer/details/(:num)', 'Customer::details/$1');
$routes->get('customer/display', 'Customer::display');


$routes->get('/product/create', 'ProductController::create'); 
$routes->get('/product/view', 'ProductController::index');
$routes->post('/product/addProduct', 'ProductController::addProduct'); 
$routes->get('product/getProducts', 'ProductController::getProducts');
$routes->post('product/delete/(:num)', 'ProductController::delete/$1');  
$routes->get('/product/fetchProduct/(:num)', 'ProductController::fetchProduct/$1');
$routes->post('/product/update', 'ProductController::update');
$routes->get('product/details/(:num)', 'ProductController::details/$1');
$routes->get('product/display', 'ProductController::display');




$routes->get('/category/create', 'CategoryController::create');
$routes->post('category/insert', 'CategoryController::insert');
$routes->get('/category/fetch', 'CategoryController::fetchAll');
$routes->get('/category/fetchCategory/(:num)', 'CategoryController::fetchCategory/$1');
$routes->post('/category/update', 'CategoryController::update');
$routes->post('/category/delete/(:num)', 'CategoryController::delete/$1');




$routes->get('order/view', 'OrderController::index'); 
$routes->post('order/addOrder', 'OrderController::addOrder'); 
$routes->get('order/getProductPrice/(:num)', 'OrderController::getProductPrice/$1');
$routes->get('order/getOrders', 'OrderController::getOrders'); 
$routes->get('order/views', 'OrderController::display'); 
$routes->post('order/delete/(:segment)', 'OrderController::delete/$1'); 
$routes->get('order/details', 'OrderController::viewdetail');
$routes->get('order/view/(:num)', 'OrderController::viewOrder/$1');
$routes->get('orders/details/(:num)', 'OrderController::getOrderDetails/$1');
$routes->get('order/fetchBookingDetails/(:num)', 'OrderController::fetchBookingDetails/$1');

$routes->get('/login', 'LoginController::create');
$routes->post('/login', 'LoginController::login');
$routes->get('/logout', 'LoginController::logout');




