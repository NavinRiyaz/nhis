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

    //Reimbursement
    $routes->match(['get', 'post'], 'reimbursement-entry', 'DistrictController::reimbursementEntry');
    $routes->match(['get', 'post'], 'reimbursement-report', 'DistrictController::reimbursementReport');
    $routes->match(['get', 'post'], 'hospitals/(:num)', 'DistrictController::hospitals/$1');
    $routes->match(['get', 'post'], 'admissions/(:num)', 'DistrictController::admissions/$1');
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
    $routes->match(['get', 'post'], 'reimbursement-report', 'UIICController::reimbursementReport');
    $routes->match(['get', 'post'], 'hospitals/(:num)', 'UIICController::hospitals/$1');
    $routes->match(['get', 'post'], 'admissions/(:num)', 'UIICController::admissions/$1');
    $routes->match(['get', 'post'], 'update-payment', 'UIICController::updatePayment');
    $routes->match(['get', 'post'], 'upload', 'UIICController::upload');

    //Payment Entry
    $routes->match(['get', 'post'], 'payment-entry', 'UIICController::paymentEntry');

    //AJAX
    $routes->match(['get', 'post'], 'get-district', 'UIICController::getDistrict');
    $routes->match(['get', 'post'], 'get-hospital', 'UIICController::getHospital');
    $routes->match(['get', 'post'], 'get-disease', 'UIICController::getDisease');
    $routes->match(['get', 'post'], 'get-treatment', 'UIICController::getTreatment');
    $routes->match(['get', 'post'], 'get-user', 'UIICController::getUser');
});

//USER ADMIN
$routes->group('admin', ["filter" => "auth"], static function ($routes) {
    $routes->get('/', 'AdminController::index');
});


$routes->get('logout', 'AuthController::logout');