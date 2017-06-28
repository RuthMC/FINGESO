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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('solicitud','SolicitudController');

Route::resource('user','UserController');

Route::get('/consulta', 'UserController@consulta');

Route::get('/inscripcion', 'UserController@inscripcion');

Route::get('/usuarios', 'UserController@index');

Route::get('/solicitudes', 'SolicitudController@index');

Route::get('/solicitar', 'SolicitudController@create');