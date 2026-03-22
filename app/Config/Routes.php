<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('donate', 'Home::donate');
$routes->get('gallery', 'Home::gallery');

// Admin
$routes->group('admin', function($routes){
    $routes->get('/', 'Admin::dashboard');
    $routes->get('members', 'Admin::members');
    $routes->post('members', 'Admin::saveMember');
    $routes->get('member/(:num)/idcard', 'Admin::generateIdCard/$1');
    $routes->get('donations', 'Admin::donations');
});

// Member
$routes->get('member/login', 'Auth::memberLogin');
$routes->post('member/login', 'Auth::processLogin');
$routes->get('member/register', 'Auth::register');
$routes->post('member/register', 'Auth::processRegister');
$routes->get('member/dashboard', 'Member::dashboard');
$routes->get('member/idcard', 'Member::downloadIdCard');

// Auth
$routes->get('admin/login', 'Auth::adminLogin');
$routes->post('admin/login', 'Auth::processAdminLogin');
$routes->get('logout', 'Auth::logout');

// id card routes 
// Admin ID Card routes
$routes->get('admin/member/(:num)/idcard/view', 'Admin::viewIdCard/$1');
$routes->get('admin/member/(:num)/idcard/download', 'Admin::generateIdCard/$1');

$routes->get('donate', 'Donation::index');
$routes->post('donate/create', 'Donation::create');
$routes->post('donate/verify', 'Donation::verify');

$routes->get('about', 'Home::about');
$routes->get('events', 'Home::events');
$routes->get('objectives', 'Home::objectives');
$routes->get('president', 'Home::president');
$routes->get('team', 'Home::team');
$routes->get('testimonials', 'Home::testimonials');
$routes->get('donors', 'Home::donors');
$routes->get('contact', 'Home::contact');
$routes->post('contact', 'Home::submitContact');
$routes->get('activity', 'Home::activity');
$routes->get('videos', 'Home::videos');
$routes->get('notice', 'Home::notice');
$routes->get('appointment', 'Home::appointment');

$routes->get('admin/about', 'Admin::about');
// $routes->get('admin/contact', 'Admin::contact');