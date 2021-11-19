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
$routes->setDefaultController('Pages');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override(function() {
    return view('errors/errors-404.php');
});
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('/', 'Pages::index');
$routes->get('detail/(:any)', 'Pages::detail/$1');
$routes->get('/keranjang', 'Pages::cart', ['filter' => 'userFilter']);
$routes->get('/produk', 'Pages::produk');
$routes->get('/akun', 'Pages::akun', ['filter' => 'userFilter']);
$routes->get('/detail-order', 'Pages::detailOrder', ['filter' => 'userFilter']);


// Auth Member
$routes->add('/login-member', 'Auth::login');
$routes->add('/register-member', 'Auth::register');
$routes->get('/logout-member', 'Auth::logout');

// Auth Admin
$routes->add('momod/login', 'Auth::loginAdmin');
$routes->get('momod/logout', 'Auth::logoutAdmin');

// Dashboard
$routes->group('dashboard', ['filter' => 'adminFilter'], function($routes){
    $routes->get('/', 'Dashboard::index');

    $routes->get('produk', 'Dashboard\Produk::index');
    $routes->get('produk/tambah-produk', 'Dashboard\Produk::create');
    $routes->post('produk/tambah-produk/save', 'Dashboard\Produk::save');
    $routes->get('produk/edit/(:any)', 'Dashboard\Produk::edit/$1');
    $routes->post('produk/edit/save', 'Dashboard\Produk::editSave');
    $routes->get('produk/hapus-variasi/(:num)/(:num)', 'Dashboard\Produk::hapusVariasi/$1/$2');
    $routes->get('produk/hapus-produk/(:num)', 'Dashboard\Produk::hapusProduk/$1');

    $routes->get('kategori', 'Dashboard/Kategori::index');
    $routes->add('kategori/tambah-kategori', 'Dashboard\Kategori::create');
    $routes->add('kategori/edit-kategori/(:num)', 'Dashboard\Kategori::edit/$1');
    $routes->get('kategori/hapus-kategori/(:num)', 'Dashboard\Kategori::delete/$1');

    $routes->get('data-transaksi/belum-membayar', 'Dashboard\Transaksi::belum_membayar');
    $routes->get('data-transaksi/sudah-membayar', 'Dashboard\Transaksi::sudah_membayar');
    $routes->get('data-transaksi/terverifikasi', 'Dashboard\Transaksi::terverifikasi');
    $routes->get('data-transaksi/dikirim', 'Dashboard\Transaksi::dikirim');
    $routes->get('data-transaksi/selesai', 'Dashboard\Transaksi::selesai');

    $routes->get('admin', 'Dashboard\Admin::index');
    $routes->get('admin/edit', 'Dashboard\Admin::edit'); // tambahin /id
    $routes->delete('admin', 'Dashboard\Admin::delete');
    $routes->get('admin/tambah-admin', 'Dashboard\Admin::create');
    $routes->get('admin/edit-profile', 'Dashboard\Admin::edit_profile'); // tambahin /id dari session
    $routes->get('admin/ubah-password', 'Dashboard\Admin::password'); // tambahin /id dari session

    $routes->get('laporan-penjualan', 'Dashboard\LaporanPenjualan::index');

    $routes->get('data-pelanggan', 'Dashboard\Pelanggan::index');
});

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
