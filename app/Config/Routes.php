<?php

declare(strict_types=1);

/**
 * This file is part of CodeIgniter 4 framework.
 *
 * (c) 2021 CodeIgniter Foundation <admin@codeigniter.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

/**
 * --------------------------------------------------------------------
 * General Routing
 * --------------------------------------------------------------------
 */
$routes->get('/', 'Home::index');

// Sessions
$routes->get('session', 'SessionStorage::index');
$routes->get('session/flash', 'SessionStorage::flashData');

// Helpers
$routes->get('helper', 'Helper::index');

// File Upload
$routes->get('upload', 'FileUpload::index');
$routes->post('upload', 'FileUpload::upload');

// Blog Restful API
$routes->resource('blogs', ['controller' => 'BlogAPI']);

/**
 * --------------------------------------------------------------------
 * Group Routing
 * --------------------------------------------------------------------
 */
$routes->group(
    'blogs',
    ['namespace' => 'App\Controllers'],
    static function ($routes) {
        $routes->get('/', 'Blogs::index'); // Static route for listing all blogs
        $routes->get('create', 'Blogs::create'); // Route for creating a new blog
        $routes->post('store', 'Blogs::store'); // Route for storing a new blog
        $routes->get('(:num)', 'Blogs::show/$1'); // Dynamic route for showing a single blog by ID
        $routes->get('edit/(:num)', 'Blogs::edit/$1'); // Dynamic route for editing a blog by ID
        $routes->post('update/(:num)', 'Blogs::update/$1'); // Dynamic route for updating a blog by ID
        $routes->get('delete/(:num)', 'Blogs::delete/$1'); // Dynamic route for deleting a blog by ID
    }
);

/**
 * --------------------------------------------------------------------
 * Filter Routing
 * --------------------------------------------------------------------
 */
$routes->group('admin', ['filter' => 'auth'], static function ($routes) {
    $routes->get('/', 'Admin::index');
    // Add more routes that need login
});
