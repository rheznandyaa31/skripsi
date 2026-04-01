<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AuthController::login');
$routes->get('login', 'AuthController::login');
$routes->post('login/attempt', 'AuthController::attemptLogin');
$routes->get('logout', 'AuthController::logout');

$routes->group('owner', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'OwnerController::index');
    $routes->get('stok-bahan-baku', 'OwnerController::stokBahanBaku');
    $routes->get('laporan-penjualan', 'OwnerController::laporanPenjualan');
    $routes->get('laporan-stok', 'OwnerController::laporanStok');
    $routes->get('atur-harga', 'OwnerController::aturHargaProduk');
    $routes->post('update-harga', 'OwnerController::updateHargaProduk');
});

$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'AdminController::index');
    $routes->get('users', 'AdminController::users');
    $routes->post('users/create', 'AdminController::createUser');
    $routes->get('produk', 'AdminController::produk');
    $routes->get('stok', 'AdminController::stok');
    $routes->post('stok/pesan', 'AdminController::pesanBahan');
    $routes->get('laporan', 'AdminController::laporan');
});

$routes->group('gudang', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'GudangController::index');
    $routes->get('monitoring', 'GudangController::monitoring');
    $routes->post('update-stok', 'GudangController::updateStok');
    $routes->get('pemesanan', 'GudangController::pemesanan');
    $routes->post('buat-pesanan', 'GudangController::buatPesanan');
});
