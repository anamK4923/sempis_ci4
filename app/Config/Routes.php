<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
$routes->get('/', 'Home::index');
$routes->get('/siswa', 'DataSiswa::index');
$routes->get('/guru', 'DataGuru::index');
$routes->get('/nilai', 'DataNilai::index');
$routes->get('/jadwal', 'DataJadwal::index');
$routes->get('/presensi', 'DataPresensi::index');
$routes->get('/kelas', 'DataKelas::index');
$routes->get('/poin', 'DataPoin::index');
$routes->get('/mapel', 'DataMapel::index');
$routes->get('/users', 'DataUsers::index');

// Routes Tambah Data
// $routes->get('/siswa/tambah', 'DataSiswa::tambah');
$routes->match(['get', 'post'], '/siswa/(:any)', 'DataSiswa::$1');
$routes->match(['get', 'post'], '/guru/(:any)', 'DataGuru::$1');
$routes->match(['get', 'post'], '/nilai/(:any)', 'DataNilai::$1');
$routes->match(['get', 'post'], '/jadwal/(:any)', 'DataJadwal::$1');
$routes->match(['get', 'post'], '/kelas/(:any)', 'DataKelas::$1');
$routes->match(['get', 'post'], '/poin/(:any)', 'DataPoin::$1');
$routes->match(['get', 'post'], '/mapel/(:any)', 'DataMapel::$1');
$routes->match(['get', 'post'], '/users/(:any)', 'DataUsers::$1');
$routes->match(['get', 'post'], '/presensi/(:any)', 'DataPresensi::$1');
// $routes->get('/siswa/(:segment)', 'DataSiswa::$1');
// $routes->post('/siswa/simpan', 'DataSiswa::simpan');

$routes->get('/siswa/edit/(:any)', 'DataSiswa::edit/$1');
$routes->get('/nilai/edit/(:any)', 'DataNilai::edit/$1');
$routes->get('/presensi/update/(:any)', 'DataPresensi::update/$1');
$routes->get('/poin/plus/(:any)', 'DataPoin::plus/$1');

//Routes Edit Data


//Routes Method Hapus
$routes->delete('/siswa/(:any)', 'DataSiswa::hapus/$1');
$routes->delete('/users/(:any)', 'DataUsers::hapus/$1');
$routes->delete('/jadwal/(:any)', 'DataJadwal::hapus/$1');
$routes->delete('/kelas/(:any)', 'DataKelas::hapus/$1');

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
