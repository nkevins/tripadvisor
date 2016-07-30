<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', 'Auth\AuthController@getLogin');
    Route::post('auth/login', 'Auth\AuthController@postLogin')->name('postLogin');
    Route::get('auth/register', 'Auth\AuthController@getRegister')->name('register');
    Route::post('auth/register', 'Auth\AuthController@postRegister')->name('postRegister');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'TripController@index')->name('home');
    Route::get('/trips', 'TripController@list')->name('listTrip');
    Route::get('/trips/create', 'TripController@create')->name('createTrip');
    Route::post('/trips/create', 'TripController@save')->name('saveTrip');
    Route::post('/trips/{id}/delete', 'TripController@delete')->name('deleteTrip');
    Route::get('/trips/{id}/edit', 'TripController@edit')->name('editTrip');
    Route::post('/trips/edit', 'TripController@saveEdit')->name('saveEditTrip');
    Route::get('/trips/{id}', 'TripController@advisor')->name('tripadvisor');
    Route::get('/trips/{id}/data', 'TripController@data')->name('tripadvisorData');
    Route::get('auth/logout', 'Auth\AuthController@getLogout')->name('logout');
});