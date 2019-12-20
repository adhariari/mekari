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


Route::get('/', 'PagesController@home');
Route::get('/todolists', 'TodolistsController@index');
Route::post('/todolists', 'TodolistsController@store');
Route::put('/todolists/{todo}', 'TodolistsController@update');
Route::delete('/todolists/{todo}', 'TodolistsController@destroy');
