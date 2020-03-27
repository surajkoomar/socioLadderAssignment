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

Route::get('/admin', function () {
    return view('admin_register');
});

Auth::routes();



Route::get('/home', 'HomeController@index')->name('product_list');
Route::get('/add_product', 'ProductController@addProduct');
Route::post('/save_product', 'ProductController@saveProduct');
Route::get('/show_product/{product_id}', 'ProductController@showProduct');
Route::get('/delete_product/{product_id}', 'ProductController@deleteProduct');
Route::post('/update_product/{product_id}', 'ProductController@updateProduct');
