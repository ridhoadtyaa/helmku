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
$routes->post('/tambah-keranjang', 'Pages::tambahCart');
$routes->post('/remove-keranjang', 'Pages::removeFromCart');
$routes->get('/produk', 'Pages::produk');
$routes->get('/tentang', 'Pages::tentang');
$routes->get('/bantuan', 'Pages::bantuan');
$routes->post('/checkout', 'Pages::checkout', ['filter' => 'userFilter']);
$routes->get('detail-order/(:any)', 'Pages::detailOrder/$1', ['filter' => 'userFilter']);
$routes->post('detail-order/bayar/(:any)', 'Pages::bayar/$1', ['filter' => 'userFilter']);
$routes->post('cancel-order', 'Pages::cancelOrder', ['filter' => 'userFilter']);
$routes->add('/ubah-alamat', 'Pages::ubahAlamat', ['filter' => 'userFilter']);
$routes->add('/tambah-alamat', 'Pages::tambahAlamat', ['filter' => 'userFilter']);
$routes->get('/akun', 'Pages::akun', ['filter' => 'userFilter']);


// Auth Member
$routes->get('/login-member', 'Auth::login');
$routes->post('/login-member-post', 'Auth::loginPost');
$routes->get('/logout-member', 'Auth::logout');
$routes->get('/register-member', 'Auth::register');
$routes->post('/register-member-post', 'Auth::registerPost');

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
    $routes->post('data-transaksi/valid/(:any)', 'Dashboard\Transaksi::validTransaction/$1');
    $routes->post('data-transaksi/tidak-valid/(:any)', 'Dashboard\Transaksi::notValidTransaction/$1');
    $routes->get('data-transaksi/terverifikasi', 'Dashboard\Transaksi::terverifikasi');
    $routes->post('data-transaksi/shipSave/(:any)', 'Dashboard\Transaksi::shipSave/$1');
    $routes->get('data-transaksi/dikirim', 'Dashboard\Transaksi::dikirim');
    $routes->post('data-transaksi/selesai/(:any)', 'Dashboard\Transaksi::transaksiSelesai/$1');
    $routes->get('data-transaksi/selesai', 'Dashboard\Transaksi::selesai');

    $routes->get('admin', 'Dashboard\Admin::index');
    $routes->get('admin/edit', 'Dashboard\Admin::edit');
    $routes->delete('admin', 'Dashboard\Admin::delete');
    $routes->get('admin/tambah-admin', 'Dashboard\Admin::create');
    $routes->get('admin/edit-profile', 'Dashboard\Admin::edit_profile'); 
    $routes->post('admin/edit-profile', 'Dashboard\Admin::update_profile'); 
    $routes->get('admin/ubah-password', 'Dashboard\Admin::password'); 
    $routes->post('admin/ubah-password', 'Dashboard\Admin::postNewPassword');

    $routes->get('laporan-penjualan', 'Dashboard\LaporanPenjualan::index');

    $routes->get('data-pelanggan', 'Dashboard\Pelanggan::index');
    $routes->get('data-pelanggan/edit/(:num)', 'Dashboard\Pelanggan::edit/$1');
    $routes->post('data-pelanggan/edit/(:num)', 'Dashboard\Pelanggan::update/$1');
    $routes->delete('data-pelanggan/(:num)', 'Dashboard\Pelanggan::delete/$1');
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
