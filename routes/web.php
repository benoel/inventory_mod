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


Route::get('/product', 'ProductController@view');
Route::get('/product/create', 'ProductController@create');
Route::post('/product', 'ProductController@store');
Route::get('/product/{id}/edit', 'ProductController@edit');
Route::put('/product/{id}/', 'ProductController@update');
Route::get('/product/{id}/delete', 'ProductController@delete');


Route::get('/supplier', 'HomeController@index');
Route::get('/costumer', 'HomeController@index');
Route::get('/category', 'HomeController@index');