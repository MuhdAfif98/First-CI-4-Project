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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

/*
 * --------------------------------------------------------------------
 * IGNORE THIS FIRST
 * --------------------------------------------------------------------
 */
// $routes->get('/', 'Home::index');

//This is for static route
$routes->add('product', 'Shop::product');

//This is for dynamic route
$routes->add('product/(:any)/(:any)', 'Shop::product/$1/$2 ');

//Make custom route
// $routes->add('blog', function(){
//     return 'This is the blog';
// });

$routes->group('admin', function($routes){
    //Must specifiy which function and method since Users in Admin folder
    $routes->add('users','Admin\Users::getAllUsers');
    $routes->add('user','Admin\Users::index');
    $routes->add('product/(:any)/(:any)', 'Admin\Shop::product/$1/$2 ');

    //Blog route
    $routes->add('blog','Admin\Blog::index');
    $routes->get('blog/new','Admin\Blog::createNew');
    $routes->post('blog/new','Admin\Blog::saveBlog');

});

$routes->get('/testing', function(){
    echo 'This is testing function';
});

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
