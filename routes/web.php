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

Route::view('/', 'home');
Route::view('/about', 'about');

// Tickets Route
Route::name('tickets.')->group(function() {

    Route::get('/contact', 'TicketsController@create')->name('create');
    Route::post('/contact', 'TicketsController@store')->name('store');
    Route::get('/tickets', 'TicketsController@index')->name('index');
    Route::get('/ticket/{slug}', 'TicketsController@show')->name('show');
    Route::get('/ticket/{slug}/edit', 'TicketsController@edit')->name('edit');
    Route::put('/ticket/{slug}/edit', 'TicketsController@update')->name('update');
    Route::delete('/ticket/{slug}', 'TicketsController@destroy')->name('destroy');

});

