<?php

$routes->group('blog', ['namespace' => 'Modules\Blog\Controllers'], function($routes) {
    $routes->get('/', 'Blog::index');
});


