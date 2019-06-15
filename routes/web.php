<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'home')->name('home');
Route::view('/about', 'about');

Route::get('users/register', 'Auth\RegisterController@showRegistrationForm');
Route::post('users/register', 'Auth\RegisterController@register');

Route::get('users/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('users/login', 'Auth\LoginController@login');

Route::get('users/logout', 'Auth\LoginController@logout')->name('logout');

// Tickets Route
Route::get('/contact', 'TicketsController@create')->name('tickets.create');
Route::post('/contact', 'TicketsController@store')->name('tickets.store');

Route::post('/comment', 'CommentsController@newComment');

Route::get('/blog', 'BlogController@index');
Route::get('/blog/{slug?}', 'BlogController@show');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.', 'middleware' => ['manager']], function() {
    Route::view('/', 'backend.index');
    // Ticket Route
    Route::name('tickets.')->group(function() {
        Route::get('/tickets', 'TicketsController@index')->name('index');
        Route::get('/ticket/{slug}', 'TicketsController@show')->name('show');
        Route::get('/ticket/{slug}/edit', 'TicketsController@edit')->name('edit');
        Route::put('/ticket/{slug}/edit', 'TicketsController@update')->name('update');
        Route::delete('/ticket/{slug}', 'TicketsController@destroy')->name('destroy');
    });
    // Role Route
    Route::name('roles.')->group(function() {
        Route::get('roles', 'RolesController@index')->name('index');
        Route::get('/roles/create', 'RolesController@create')->name('create');
        Route::post('/roles/create', 'RolesController@store')->name('store');
    });
    Route::name('users.')->group(function() {
        Route::get('users', 'UsersController@index')->name('index');
        Route::get('users/{id?}/edit', 'UsersController@edit')->name('edit');
        Route::post('users/{id?}/edit','UsersController@update')->name('update');
    });

    Route::get('categories', 'CategoriesController@index');
    Route::get('categories/create', 'CategoriesController@create');
    Route::post('categories/create', 'CategoriesController@store');

    Route::get('posts', 'PostsController@index');
    Route::get('posts/create', 'PostsController@create');
    Route::post('posts/create', 'PostsController@store');
    Route::get('posts/{id?}/edit', 'PostsController@edit');
    Route::post('posts/{id?}/edit','PostsController@update');


});
