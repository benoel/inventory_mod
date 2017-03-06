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

Route::get('/supplier', 'SupplierController@view');
Route::get('/supplier/create', 'SupplierController@create');
Route::post('/supplier', 'SupplierController@store');
Route::get('/supplier/{id}/edit', 'SupplierController@edit');
Route::put('/supplier/{id}/', 'SupplierController@update');
Route::get('/supplier/{id}/delete', 'SupplierController@delete');

Route::get('/product', 'ProductController@view');
Route::get('/product/create', 'ProductController@create');
Route::post('/product', 'ProductController@store');
Route::get('/product/{id}/edit', 'ProductController@edit');
Route::put('/product/{id}/', 'ProductController@update');
Route::get('/product/{id}/delete', 'ProductController@delete');


Route::get('/customer', 'CustomerController@view');
Route::get('/customer/create', 'CustomerController@create');
Route::post('/customer', 'CustomerController@store');
Route::get('/customer/{id}/edit', 'CustomerController@edit');
Route::put('/customer/{id}/', 'CustomerController@update');
Route::get('/customer/{id}/delete', 'CustomerController@delete');


Route::get('/category', 'CategoryController@view');
Route::get('/category/create', 'CategoryController@create');
Route::post('/category', 'CategoryController@store');
Route::get('/category/{id}/edit', 'CategoryController@edit');
Route::put('/category/{id}/', 'CategoryController@update');
Route::get('/category/{id}/delete', 'CategoryController@delete');


Route::get('/purchase', 'PurchaseController@view');
Route::get('/purchase/create', 'PurchaseController@create');
Route::post('/purchase', 'PurchaseController@store');
Route::get('/purchase/{id}/edit', 'PurchaseController@edit');
Route::put('/purchase/{id}/', 'PurchaseController@update');
Route::get('/purchase/{id}/delete', 'PurchaseController@delete');

Route::get('/test/{type?}', 'HomeController@transaction');
Route::get('/barang/{barcode}', 'HomeController@additem');
