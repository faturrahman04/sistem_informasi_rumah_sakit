<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomePage::index');

// Auth
$routes->get('/login', 'Auth::loginPage');
$routes->post('/proses', 'Auth::prosesLogin');
$routes->get('/logout', 'Auth::logout');


$routes->get('/regis', 'Auth::regisPage');
$routes->post('/daftar', 'Auth::daftarData');
// AUth

// Admin routes
$routes->get('/admin', 'Admin::homeAdmin', ['filter' => 'auth']);
// Dokter
$routes->get('/admin/dokter', 'Admin::dokter', ['filter' => 'auth']);
$routes->post('/admin/dokter/tambahdokter', 'Admin::tambahDokter');
$routes->post('/admin/dokter/updatedokter/(:num)', 'Admin::updateDokter/$1');
$routes->get('/admin/dokter/delete(:num)', 'Admin::deleteDokter/$1');
$routes->get('/admin/dokter/viewdokter', 'Admin::viewdokter');
$routes->get('/admin/dokter/search', 'Admin::searchdokter');
// Dokter

// Suster
$routes->get('/admin/suster', 'Admin::suster', ['filter' => 'auth']);
$routes->post('/admin/suster/tambahsuster', 'Admin::tambahSuster');
$routes->post('/admin/suster/updatesuster/(:num)', 'Admin::updateSuster/$1');
$routes->get('/admin/suster/delete(:num)', 'Admin::deleteSuster/$1');
$routes->get('/admin/suster/viewsuster', 'Admin::viewsuster');
$routes->get('/admin/suster/search', 'Admin::searchsuster');
// Suster

// Pasien
$routes->get('/admin/pasien', 'Admin::pasien', ['filter' => 'auth']);
$routes->post('/admin/pasien/tambahpasien', 'Admin::tambahPasien');
$routes->post('/admin/pasien/updatepasien/(:num)', 'Admin::updatePasien/$1');
$routes->get('/admin/pasien/delete(:num)', 'Admin::deletePasien/$1');
$routes->get('/admin/pasien/viewpasien', 'Admin::viewpasien');
$routes->get('/admin/pasien/search', 'Admin::searchpasien');
// Pasien

// Kamar
$routes->get('/admin/kamar', 'Admin::kamar', ['filter' => 'auth']);
$routes->post('/admin/kamar/tambahkamar', 'Admin::tambahKamar');
$routes->post('/admin/kamar/updatekamar/(:num)', 'Admin::updateKamar/$1');
$routes->get('/admin/kamar/delete(:num)', 'Admin::deleteKamar/$1');
$routes->get('/admin/kamar/viewkamar', 'Admin::viewkamar');
$routes->get('/admin/kamar/search', 'Admin::searchkamar');
// Kamar

// Obat
$routes->get('/admin/obat', 'Admin::obat', ['filter' => 'auth']);
$routes->post('/admin/obat/tambahobat', 'Admin::tambahObat');
$routes->post('/admin/obat/updateobat/(:num)', 'Admin::updateObat/$1');
$routes->get('/admin/obat/delete(:num)', 'Admin::deleteObat/$1');
$routes->get('/admin/obat/viewobat', 'Admin::viewobat');
$routes->get('/admin/obat/search', 'Admin::searchobat');
// Obat

$routes->get('/admin/laporan', 'Laporan::index');
$routes->post('/laporan/create', 'Laporan::create');
$routes->get('/laporan/generatePdf/(:num)', 'Laporan::generatePdf/$1');
$routes->get('/admin/laporan/delete(:num)', 'Laporan::deleteLaporan/$1');
// Admin routes
