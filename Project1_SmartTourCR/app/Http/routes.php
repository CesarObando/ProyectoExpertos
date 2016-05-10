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

Route::get('/','PrincipalController@index');
Route::get('listarLugares','LugarController@listar');
Route::get('listarAtractivos','AtractivoController@listar');
Route::resource('lugar','LugarController');
Route::resource('atractivo','AtractivoController');
