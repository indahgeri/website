<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('countdown', 'Home::countdown');

$modules_path = ROOTPATH . 'modules/';
$modules = scandir($modules_path);

foreach ($modules as $module) {
    if ($module === '.' || $module === '..') continue;
    $routes_file = $modules_path . $module . '/Config/Routes.php';
    if (file_exists($routes_file)) {
        require $routes_file;
    }
}

// 1) Route khusus untuk /invite/klasik/<tamu>
// $routes->get('invite/klasik/(:segment)', 'Invite::klasik/$1');

// 2) Jika hanya /invite/klasik tanpa nama tamu
// $routes->get('invite/klasik', 'Invite::klasik');

// Format /invite/elang-surya
$routes->get('invite/(:segment)', 'Invite::index/$1');

// Catch-all fallback (taruh paling akhir)
$routes->get('(:segment)', 'Invite::index/$1');