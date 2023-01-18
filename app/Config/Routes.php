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
$routes->setDefaultMethod('index');
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
// route since we don't have to scan directories.

$routes->setAutoRoute(true);
$routes->get('/', 'Login::index');
$routes->get('/login', 'Login::index');
$routes->get('/logout', 'Login::logout');

// Admin
$routes->add('/admin', 'admin\Dashboard::index');
$routes->add('/admin/dashboard', 'admin\Dashboard::index');
$routes->add('/admin/data-karyawan', 'admin\DataKaryawan::index');
$routes->add('/admin/data-karyawan/tambah-karyawan', 'admin\DataKaryawan::tambahKaryawan');
$routes->get('/admin/data-karyawan/edit-karyawan/(:segment)', 'admin\DataKaryawan::editKaryawan/$1');
$routes->post('/admin/data-karyawan/save', 'admin\DataKaryawan::save');
$routes->add('/admin/data-karyawan/update/(:segment)', 'admin\DataKaryawan::update/$1');
$routes->get('/admin/data-karyawan/delete/(:segment)', 'admin\DataKaryawan::delete/$1');
$routes->add('/admin/data-divisi', 'admin\DataDivisi::index');
$routes->add('/admin/data-divisi/tambah-divisi', 'admin\DataDivisi::tambahDivisi');
$routes->add('/admin/data-divisi/edit-divisi/(:segment)', 'admin\DataDivisi::editDivisi/$1');
$routes->add('/admin/data-divisi/save', 'admin\DataDivisi::save');
$routes->add('/admin/data-divisi/update/(:segment)', 'admin\DataDivisi::update/$1');
$routes->add('/admin/data-divisi/delete/(:segment)', 'admin\DataDivisi::delete/$1');
$routes->add('/admin/rekap-absen', 'admin\RekapAbsen::index');
$routes->add('/admin/rekap-absen/tambah-rekap-absen', 'admin\RekapAbsen::tambahRekapAbsen');
$routes->add('/admin/rekap-absen/edit-rekap-absen', 'admin\RekapAbsen::editRekapAbsen');
$routes->add('/admin/rekap-absen/save', 'admin\RekapAbsen::save');
$routes->add('/admin/rekap-absen/update', 'admin\RekapAbsen::update');
$routes->add('/admin/rekap-absen/delete/(:segment)', 'admin\RekapAbsen::delete/$1');

$routes->add('/admin/gaji-perhari', 'admin\GajiPerhari::index');
$routes->add('/admin/gaji-perhari/tambah-gaji-harian', 'admin\GajiPerhari::tambahGajiHarian');
$routes->add('/admin/gaji-perhari/edit-gaji-harian/(:segment)', 'admin\GajiPerhari::editGajiHarian/$1');
$routes->add('/admin/gaji-perhari/update/(:segment)', 'admin\GajiPerhari::update/$1');
$routes->add('/admin/gaji-perhari/save', 'admin\GajiPerhari::save');
$routes->add('/admin/gaji-perhari/delete/(:segment)', 'admin\GajiPerhari::delete/$1');
$routes->add('/admin/potong-gaji', 'admin\PotongGaji::index');
$routes->add('/admin/potong-gaji/tambah-potongan', 'admin\PotongGaji::tambahPotongan');
$routes->add('/admin/potong-gaji/edit-potongan/(:segment)', 'admin\PotongGaji::editPotongan/$1');
$routes->add('/admin/potong-gaji/save', 'admin\PotongGaji::save');
$routes->add('/admin/potong-gaji/update/(:segment)', 'admin\PotongGaji::update/$1');
$routes->add('/admin/potong-gaji/delete/(:Segment)', 'admin\PotongGaji::delete/$1');
$routes->add('/admin/pinjaman', 'admin\Pinjaman::index');
$routes->add('/admin/pinjaman/tambah-pinjaman', 'admin\Pinjaman::tambahPinjaman');
$routes->add('/admin/pinjaman/edit-pinjaman/(:segment)', 'admin\Pinjaman::editPinjaman/$1');
$routes->add('/admin/pinjaman/update/(:segment)', 'admin\Pinjaman::update/$1');
$routes->add('/admin/pinjaman/save', 'admin\Pinjaman::save');
$routes->add('/admin/pinjaman/delete/(:segment)', 'admin\Pinjaman::delete/$1');
$routes->add('/admin/data-gaji', 'admin\DataGaji::index');


$routes->add('/admin/laporan-gaji', 'admin\LaporanGaji::index');
$routes->add('/admin/laporan-gaji/cetak', 'admin\LaporanGaji::cetakGaji');
$routes->add('/admin/laporan-absensi', 'admin\LaporanAbsensi::index');
$routes->add('/admin/laporan-absensi/cetak', 'admin\LaporanAbsensi::cetakRekapAbsen');
$routes->add('/admin/slip-gaji', 'admin\SlipGaji::index');
$routes->add('/admin/slip-gaji/cetak', 'admin\SlipGaji::cetakSlipGaji');

$routes->add('/admin/ubah-password', 'admin\UbahPassword::index');
$routes->add('/admin/ubah-password/update-password/(:segment)', 'admin\UbahPassword::updatePass/$1');

// Karyawan
$routes->add('/karyawan', 'karyawan\Dashboard::index');
$routes->add('/karyawan/dashboard', 'karyawan\Dashboard::index');
$routes->add('/karyawan/data-gaji', 'karyawan\DataGaji::index');
$routes->add('/karyawan/data-gaji/', 'karyawan\DataGaji::index');
$routes->add('/karyawan/ubah-password', 'karyawan\UbahPassword::index');
$routes->add('/karyawan/ubah-password/update-password/(:segment)', 'karyawan\UbahPassword::updatePass/$1');

// counter
$routes->add('/admin/(:any)', 'admin\Dashboard::index');
$routes->add('/karyawan/(:any)', 'karyawan\Dashboard::index');

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
