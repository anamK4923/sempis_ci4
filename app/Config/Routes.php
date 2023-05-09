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
$routes->get('/jadwal', 'DataJadwal::index');
$routes->get('/poin', 'DataPoin::index');
$routes->get('/mapel', 'DataMapel::index');
$routes->get('/kelas', 'DataKelas::index');

// $routes->get('/siswa/tambah', 'DataSiswa::tambah');
$routes->match(['get', 'post'], '/siswa/(:segment)', 'DataSiswa::$1');
$routes->match(['get', 'post'], '/guru/(:segment)', 'DataGuru::$1');
$routes->match(['get', 'post'], '/jadwal/(:segment)', 'DataJadwal::$1');
$routes->match(['get', 'post'], '/poin/(:segment)', 'DataPoin::$1');
$routes->match(['get', 'post'], '/mapel/(:segment)', 'DataMapel::$1');
$routes->match(['get', 'post'], '/kelas/(:segment)', 'DataKelas::$1');
// $routes->get('/siswa/(:segment)', 'DataSiswa::$1');
// $routes->post('/siswa/simpan', 'DataSiswa::simpan');

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
