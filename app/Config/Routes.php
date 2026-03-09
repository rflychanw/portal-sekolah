<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('about', 'Home::about');
$routes->get('academics', 'Home::academics');
$routes->get('curriculum', 'Home::curriculum');
$routes->get('extracurricular', 'Home::extracurricular');
$routes->get('news', 'Home::news');
$routes->get('news/(:segment)', 'Home::newsDetail/$1');
$routes->get('program/(:segment)', 'Home::programDetail/$1');
$routes->get('contact', 'Contact::index');
$routes->post('contact/submit', 'Contact::submit');
$routes->get('register', 'Registration::index');
$routes->post('register/submit', 'Registration::submit');




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

    // Student Management
    $routes->group('students', function ($routes) {
        $routes->get('/', 'Admin\Student::index');
        $routes->get('delete/(:num)', 'Admin\Student::delete/$1');
    });

    // Teacher Management
    $routes->group('teachers', function ($routes) {
        $routes->get('/', 'Teacher::index');
        $routes->get('create', 'Teacher::create');
        $routes->post('store', 'Teacher::store');
        $routes->get('edit/(:num)', 'Teacher::edit/$1');
        $routes->post('update/(:num)', 'Teacher::update/$1');
        $routes->get('delete/(:num)', 'Teacher::delete/$1');
    });

    // Article Management (Admin)
    $routes->group('articles', function ($routes) {
        $routes->get('/', 'Admin\Article::index');
        $routes->get('create', 'Admin\Article::create');
        $routes->post('store', 'Admin\Article::store');
        $routes->get('edit/(:num)', 'Admin\Article::edit/$1');
        $routes->post('update/(:num)', 'Admin\Article::update/$1');
        $routes->get('delete/(:num)', 'Admin\Article::delete/$1');
    });

    // Guru Pages (inside admin)
    $routes->group('guru', function ($routes) {
        $routes->get('dashboard', 'Guru::dashboard');
        $routes->get('profile', 'Guru::profile');
        $routes->get('logout', 'Auth::logout');

        // Article Management (Guru)
        $routes->group('articles', function ($routes) {
            $routes->get('/', 'Guru\Article::index');
            $routes->get('create', 'Guru\Article::create');
            $routes->post('store', 'Guru\Article::store');
            $routes->get('edit/(:num)', 'Guru\Article::edit/$1');
            $routes->post('update/(:num)', 'Guru\Article::update/$1');
            $routes->get('delete/(:num)', 'Guru\Article::delete/$1');
        });
    });

    // Registration Management
    $routes->group('pendaftaran', function ($routes) {
        $routes->get('/', 'Admin\Pendaftaran::index');
        $routes->get('show/(:num)', 'Admin\Pendaftaran::show/$1');
        $routes->post('update-status/(:num)', 'Admin\Pendaftaran::updateStatus/$1');
        $routes->get('delete/(:num)', 'Admin\Pendaftaran::delete/$1');
        $routes->get('settings', 'Admin\Pendaftaran::settings');
        $routes->post('settings/update', 'Admin\Pendaftaran::updateSettings');
    });

    // Message Management
    $routes->group('messages', function ($routes) {
        $routes->get('/', 'Admin\Message::index');
        $routes->get('show/(:num)', 'Admin\Message::show/$1');
        $routes->get('delete/(:num)', 'Admin\Message::delete/$1');
    });

    // Academic Calendar Management
    $routes->group('academic-calendar', function ($routes) {
        $routes->get('/', 'Admin\AcademicCalendar::index');
        $routes->post('store', 'Admin\AcademicCalendar::store');
        $routes->post('update/(:num)', 'Admin\AcademicCalendar::update/$1');
        $routes->get('delete/(:num)', 'Admin\AcademicCalendar::delete/$1');
    });

    // Program & Extracurricular CMS
    $routes->group('programs', function ($routes) {
        $routes->get('/', 'Admin\Program::index');
        $routes->post('store', 'Admin\Program::storeProgram');
        $routes->post('update/(:num)', 'Admin\Program::updateProgram/$1');
        $routes->get('delete/(:num)', 'Admin\Program::deleteProgram/$1');
    });

    $routes->group('achievements', function ($routes) {
        $routes->post('store', 'Admin\Program::storeAchievement');
        $routes->post('update/(:num)', 'Admin\Program::updateAchievement/$1');
        $routes->get('delete/(:num)', 'Admin\Program::deleteAchievement/$1');
    });
});
