<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('/', 'Pages::index');

// Auth
$routes->get('/login', 'Auth::login');
$routes->get('/register', 'Auth::register');

// Dashboard
$routes->get('/dashboard', 'Dashboard::index');

$routes->get('/dashboard/produk', 'Dashboard/Produk::index');
$routes->get('/dashboard/produk/tambah-produk', 'Dashboard/Produk::create');
$routes->get('/dashboard/produk/edit', 'Dashboard/Produk::edit'); // tambahin /kodeproduk

$routes->get('/dashboard/data-transaksi', 'Dashboard/Transaksi::index');

$routes->get('/dashboard/admin', 'Dashboard/Admin::index');
$routes->get('/dashboard/admin/edit', 'Dashboard/Admin::edit'); // tambahin /id
$routes->delete('/dashboard/admin/', 'Dashboard/Admin::delete');
$routes->get('/dashboard/admin/tambah-admin', 'Dashboard/Admin::create');
$routes->get('/dashboard/admin/edit-profile', 'Dashboard/admin::edit_profile'); // tambahin /id dari session
$routes->get('/dashboard/admin/ubah-password', 'Dashboard/admin::password'); // tambahin /id dari session

$routes->get('/dashboard/laporan-penjualan', 'Dashboard/LaporanPenjualan::index');

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
