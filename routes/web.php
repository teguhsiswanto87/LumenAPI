<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

//$router->get('/', function () use ($router) {
//    return $router->app->version();
//});

//show version of Lumen
$router->get('/', function () {
    return view('greeting', ['name' => 'Kartonyono Medot Janji']);
});

// User
$router->post('/login', 'LoginController@login');
$router->post('/register', 'UserController@register');
$router->get('/user', ['middleware' => 'auth', 'uses' => 'UserController@get_user']);

// Author
$router->group(['prefix' => 'api'], function () use ($router) {

    // Authors
    $router->get('authors', ['uses' => 'AuthorController@showAllAuthors']);
    $router->get('authors/{id}', ['uses' => 'AuthorController@showOneAuthor']);
    $router->post('authors', ['uses' => "AuthorController@create"]);
    $router->delete('authors/{id}', ['uses' => 'AuthorController@delete']);
    $router->put('authors/{id}', ['uses' => 'AuthorController@update']);


    // Produk
    $router->get('produk', ['uses' => 'ProdukController@showAllProduk']);
    $router->get('produk/{id}', ['uses' => 'ProdukController@showOneProduk']);
    $router->post('produk', ['uses' => 'ProdukController@create']);
    $router->put('produk/{id}', ['uses' => 'ProdukController@update']);
    $router->delete('produk/{id}', ['uses' => 'ProdukController@delete']);

    // Pengguna
    $router->get('pengguna', ['uses' => 'PenggunaController@showAllPengguna']);

    // Modul
    // Belanja
    // Detail Belanja

});
