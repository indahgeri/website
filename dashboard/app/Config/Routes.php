<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$modules_path = ROOTPATH . 'modules/';
$modules = scandir($modules_path);

foreach ($modules as $module) {
    if ($module === '.' || $module === '..') continue;
    $routes_file = $modules_path . $module . '/Config/Routes.php';
    if (file_exists($routes_file)) {
        require $routes_file;
    }
}
