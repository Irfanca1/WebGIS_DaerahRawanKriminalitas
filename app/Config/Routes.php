<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('halaman_utama');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default

// Route since we don't have to scan directories.
$routes->get('/', 'Home::halaman_utama');
$routes->get('/halaman_utama', 'Home::halaman_utama');
$routes->cli('/server', 'Server::index');

// Register dan Login
$routes->get('/register', 'Users::register');
$routes->get('/login', 'Users::index');
$routes->post('/register', 'Users::register');
$routes->post('/index', 'Users::index');
$routes->get('/logout', 'Users::logout');

// Halaman Admin
$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'auth']);
$routes->get('/chat', 'Chat::index', ['filter' => 'auth']);
$routes->get('/wilayah', 'wilayah::wilayah_data_read', ['filter' => 'auth']);
$routes->get('/maps', 'maps::index', ['filter' => 'auth']);
$routes->post('/wilayah_data_save', 'Wilayah::wilayah_data_save', ['filter' => 'auth']);
$routes->get('/detailWilayah/(:any)', 'Wilayah::wilayah_detail/$1');
$routes->post('/wilayah/wilayahUpdate/(:segment)', 'Wilayah::wilayahUpdate/$1', ['filter' => 'auth']);
$routes->get('/editWilayah/(:any)', 'Wilayah::wilayah_edit/$1', ['filter' => 'auth']);
$routes->get('/wilayahDelete/(:any)', 'Wilayah::wilayahDelete/$1', ['filter' => 'auth']);

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
