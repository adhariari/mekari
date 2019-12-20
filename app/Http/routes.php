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

//Halaman index
Route::get('/', 'PagesController@home');
//Halaman to do list
Route::get('/todolists', 'TodolistsController@index');
//Adding to do list
Route::post('/todolists', 'TodolistsController@store');
//update to done
Route::put('/todolists/{todo}', 'TodolistsController@update');
//delete list
Route::delete('/todolists/{todo}', 'TodolistsController@destroy');
