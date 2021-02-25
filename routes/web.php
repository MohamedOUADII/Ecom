<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {return view('index');});
Route::post('/connection','HomeController@connection');
Route::get('/logout','HomeController@logout');
Route::get('/home', 'HomeController@home');

Route::get('/products','ProductController@index');
Route::get('/products/create','ProductController@create');
Route::post('/products/add','ProductController@add');
Route::get('/products/edit/{id}','ProductController@edit');
Route::post('/products/update','ProductController@update');
Route::delete('/products/delete','ProductController@delete');
Route::get('/products/excel','ProductController@excel');

Route::get('/orders','OrderController@index');
Route::get('/orders/create','OrderController@create');
Route::post('/orders/add','OrderController@add');
Route::get('/orders/edit/{id}','OrderController@edit');
Route::post('/orders/update','OrderController@update');
Route::get('/orders/excel','OrderController@excel');

Route::get('/coupons','CouponController@index');
Route::get('/coupons/create','CouponController@create');
Route::post('/coupons/add','CouponController@add');
Route::get('/coupons/edit/{id}','CouponController@edit');
Route::post('/coupons/update','CouponController@update');
Route::delete('/coupons/delete','CouponController@delete');
Route::get('/coupons/excel','CouponController@excel');

Route::get('/customers','CustomerController@index');
Route::get('/customers/create','CustomerController@create');
Route::post('/customers/add','CustomerController@add');
Route::get('/customers/edit/{id}','CustomerController@edit');
Route::post('/customers/update','CustomerController@update');
Route::delete('/customers/delete','CustomerController@delete');
Route::get('/customers/excel','CustomerController@excel');




