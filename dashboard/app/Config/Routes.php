<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('countdown', 'Home::countdown');

// -------------------------
// CRUD Invited Guests
// -------------------------
$routes->get(   'invited-guests',             'InvitedGuests::index');
$routes->get(   'invited-guests/create',      'InvitedGuests::create');
$routes->post(  'invited-guests/store',       'InvitedGuests::store');
$routes->get(   'invited-guests/edit/(:num)', 'InvitedGuests::edit/$1');
$routes->post(  'invited-guests/update/(:num)','InvitedGuests::update/$1');
$routes->post(  'invited-guests/delete/(:num)','InvitedGuests::delete/$1');

// -------------------------
// Modules (jika ada folder modules/…)
// -------------------------
$modules_path = ROOTPATH . 'modules/';
$modules      = scandir($modules_path);

foreach ($modules as $module) {
    if ($module === '.' || $module === '..') continue;
    $routes_file = $modules_path . $module . '/Config/Routes.php';
    if (file_exists($routes_file)) {
        require $routes_file;
    }
}

// -------------------------
// Routing invite (catch‐all utk invite/…)
// -------------------------
// 1) Route khusus untuk /invite/klasik/<tamu>
// $routes->get('invite/klasik/(:segment)', 'Invite::klasik/$1');
// 2) Jika hanya /invite/klasik tanpa nama tamu
// $routes->get('invite/klasik', 'Invite::klasik');

// Format /invite/elang-surya
$routes->get('invite/(:segment)', 'Invite::index/$1');

// Catch-all fallback (taruh paling akhir)
$routes->get('(:segment)', 'Invite::index/$1');