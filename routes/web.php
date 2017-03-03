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

// Route::get('/', function () {
// 	return view('welcome');
// });

Route::get('/', 'HomeController@index');
Route::get('/product', 'HomeController@index');
Route::get('/supplier', 'HomeController@index');
Route::get('/costumer', 'HomeController@index');
Route::get('/category', 'HomeController@index');