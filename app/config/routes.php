<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
/**
 * ... (comment block, hindi na babaguhin)
 */

/*
| -------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------
| Here is where you can register web routes for your application.
|
|
*/
/** @var object $router **/

require_once APP_DIR . 'middlewares/AuthMiddleware.php';

get_config([
    'middlewares' => [
        'AuthMiddleware' => new AuthMiddleware(),
    ],
]);

$router->get('/', 'AuthController::login');
// Auth routes - public, walang middleware.
$router->get('/login', 'AuthController::login');
$router->post('/login', 'AuthController::authenticate');
$router->get('/logout', 'AuthController::logout');

// Product routes - lahat ng nasa loob nito ay protektado ng AuthMiddleware.
$router->group(['middleware' => 'AuthMiddleware'], function ($router) {
    $router->get('/products', 'ProductController::index');

    $router->get('/products/create', 'ProductController::create');
    $router->post('/products/create', 'ProductController::create');

    $router->get('/products/edit/{id}', 'ProductController::edit')->where_number('id');
    $router->post('/products/edit/{id}', 'ProductController::edit')->where_number('id');

    $router->get('/products/delete/{id}', 'ProductController::delete')->where_number('id');
});