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


//Admin
Route::get('/admin', 'AdminController@index');
Route::get('/dashboard', 'AdminController@showdashboard');
Route::match(['get', 'post'],'/admin-dashboard', 'AdminController@dashboard');
Route::get('/logout', 'AdminController@logout');

//Quanly sp
Route::get('/all-product', 'ProductController@all_product');
Route::get('/add-product', 'ProductController@add_product');
Route::post('/save-product', 'ProductController@save_product');
Route::get('/edit-product/{id}', 'ProductController@edit_product');
Route::post('/update-product/{id}', 'ProductController@update_product');
Route::get('/delete-product/{id}', 'ProductController@delete_product');


//Quanly loaisanpham
Route::get('/quanlyloaisp', 'QuanLyController@quanlyloaisp');
Route::get('/themlsp', 'QuanLyController@themlsp');
Route::post('/save-themlsp', 'QuanLyController@save_themlsp');
Route::get('/sualsp/{category_product_id}', 'QuanLyController@sualsp');
Route::post('/update-lsp/{category_product_id}', 'QuanLyController@update_lsp');
Route::get('/xoa-lsp/{category_product_id}', 'QuanLyController@xoa_lsp');