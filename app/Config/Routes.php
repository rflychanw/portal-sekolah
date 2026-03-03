<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('about', 'Home::about');
$routes->get('academics', 'Home::academics');
$routes->get('news', 'Home::news');
$routes->get('contact', 'Home::contact');
$routes->get('register', 'Home::register');




// Auth Routes
$routes->group('auth', function ($routes) {
    $routes->get('login', 'Auth::login');
    $routes->post('loginProcess', 'Auth::loginProcess');
    $routes->get('logout', 'Auth::logout');
});

// Admin Routes
$routes->group('admin', function ($routes) {
    $routes->get('/', 'Admin::index');
    $routes->get('profile', 'Admin::profile');

    // Teacher Management
    $routes->group('teachers', function ($routes) {
        $routes->get('/', 'Teacher::index');
        $routes->get('create', 'Teacher::create');
        $routes->post('store', 'Teacher::store');
        $routes->get('edit/(:num)', 'Teacher::edit/$1');
        $routes->post('update/(:num)', 'Teacher::update/$1');
        $routes->get('delete/(:num)', 'Teacher::delete/$1');
    });

    // Guru Pages (inside admin)
    $routes->group('guru', function ($routes) {
        $routes->get('dashboard', 'Guru::dashboard');
        $routes->get('profile', 'Guru::profile');
        $routes->get('logout', 'Auth::logout');
    });
});
