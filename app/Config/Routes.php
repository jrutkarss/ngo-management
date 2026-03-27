<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Home routes
$routes->get('/', 'Home::index');
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
$routes->post('donate', 'Home::donate');
$routes->get('gallery', 'Home::gallery');

// Authentication
$routes->get('admin/login', 'Auth::adminLogin');
$routes->post('admin/login', 'Auth::processAdminLogin');
$routes->get('member/login', 'Auth::memberLogin');
$routes->post('member/login', 'Auth::processLogin');
$routes->get('member/register', 'Auth::register');
$routes->post('member/register', 'Auth::processRegister');
$routes->get('logout', 'Auth::logout');

// Donation routes
$routes->get('donate', 'Donation::index');
$routes->post('donate/create', 'Donation::create');
$routes->post('donate/verify', 'Donation::verify');
$routes->post('donate/razorpay', 'Donation::processRazorpay');
$routes->post('donate/verify-payment', 'Donation::verifyPayment');

// Member routes
$routes->get('member/dashboard', 'Member::dashboard');
$routes->get('member/idcard', 'Member::downloadIdCard');
$routes->get('member/donations', 'Member::donations');
$routes->get('member/certificates', 'Member::certificates');
$routes->get('member/messages', 'Member::messages');
$routes->get('member/profile', 'Member::profile');
$routes->post('member/update-profile', 'Member::updateProfile');

// Admin routes
$routes->group('admin', function($routes) {
    // Dashboard
    $routes->get('/', 'Admin::dashboard');
    $routes->get('dashboard', 'Admin::dashboard');
    
    // Member Management
    $routes->get('members', 'Admin::members');
    $routes->get('members/add', 'Admin::editMember/0');
    $routes->post('members/save', 'Admin::saveMember');
    $routes->get('members/edit/(:num)', 'Admin::editMember/$1');
    $routes->post('members/update/(:num)', 'Admin::updateMember/$1');
    $routes->get('members/block/(:num)', 'Admin::blockMember/$1');
    $routes->get('members/unblock/(:num)', 'Admin::unblockMember/$1');
    $routes->get('members/idcard/(:num)', 'Admin::generateIdCard/$1');
    
    // Donation Management
    $routes->get('donations', 'Admin::donations');
    $routes->get('donations/add-cash', 'Admin::addCashDonation');
    $routes->post('donations/save-cash', 'Admin::saveCashDonation');
    $routes->get('donations/receipt/(:num)', 'Admin::viewReceipt/$1');
    
    // Event Management
    $routes->get('events', 'Admin::events');
    $routes->get('events/add', 'Admin::addEvent');
    $routes->post('events/save', 'Admin::saveEvent');
    $routes->get('events/registrations/(:num)', 'Admin::eventRegistrations/$1');
    
    // Campaign Management
    // $routes->get('campaigns', 'Admin::campaigns');
    // $routes->post('campaigns/save', 'Admin::saveCampaign');
    
    // Project Management
    // $routes->get('projects', 'Admin::projects');
    // $routes->post('projects/save', 'Admin::saveProject');
    
    // News Management
    $routes->get('news', 'Admin::news');
    $routes->get('news/add', 'Admin::addNews');
    $routes->post('news/save', 'Admin::saveNews');
    $routes->get('news/edit/(:num)', 'Admin::editNews/$1');
    $routes->post('news/update/(:num)', 'Admin::updateNews/$1');
    $routes->get('news/delete/(:num)', 'Admin::deleteNews/$1');
    
    // Enquiry Management
    $routes->get('enquiries', 'Admin::enquiries');
    $routes->get('enquiries/view/(:num)', 'Admin::respondEnquiry/$1');
    $routes->post('enquiries/response/(:num)', 'Admin::saveResponse/$1');
    
    // About page
    $routes->get('about', 'Admin::about');
});

// Old routes (keeping for backward compatibility)
// $routes->group('admin', function($routes){
//     $routes->get('/', 'Admin::dashboard');
//     $routes->get('members', 'Admin::members');
//     $routes->post('members', 'Admin::saveMember');
//     $routes->get('member/(:num)/idcard', 'Admin::generateIdCard/$1');
//     $routes->get('donations', 'Admin::donations');
// });

// id card routes 
$routes->get('admin/member/(:num)/idcard/view', 'Admin::viewIdCard/$1');
$routes->get('admin/member/(:num)/idcard/download', 'Admin::generateIdCard/$1');
