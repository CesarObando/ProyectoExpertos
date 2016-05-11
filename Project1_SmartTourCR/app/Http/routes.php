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

Route::resource('insertarLugar','LugarController@create');
Route::get('verLugares','LugarController@verLugares');
Route::resource('lugar','LugarController');

Route::resource('insertarAtractivo','AtractivoController@create');
Route::get('verAtractivos','AtractivoController@verAtractivos');
Route::resource('atractivo','AtractivoController');
