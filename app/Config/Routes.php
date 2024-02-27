<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->match(['get', 'post'], '/', 'AuthController::index', ['filter' => 'noAuth']);

//SUPER ADMIN
$routes->group('super', ["filter" => "auth"], static function ($routes) {
    $routes->get('/', 'SuperController::index');
});

//DISTRICT
$routes->group('district', ["filter" => "auth"], static function ($routes) {
    $routes->get('/', 'DistrictController::index');
});

//STATE
$routes->group('state', ["filter" => "auth"], static function ($routes) {
    $routes->get('/', 'StateController::index');
});

//HIGH
$routes->group('high', ["filter" => "auth"], static function ($routes) {
    $routes->get('/', 'HighController::index');
});

//UIIC
$routes->group('uiic', ["filter" => "auth"], static function ($routes) {
    $routes->get('/', 'UIICController::index');

    //Reimbursement
    $routes->match(['get', 'post'], 'reimbursement-entry', 'UIICController::reimbursementEntry');

    //Payment Entry
    $routes->match(['get', 'post'], 'payment-entry', 'UIICController::paymentEntry');
});

//USER ADMIN
$routes->group('admin', ["filter" => "auth"], static function ($routes) {
    $routes->get('/', 'AdminController::index');
});


$routes->get('logout', 'AuthController::logout');