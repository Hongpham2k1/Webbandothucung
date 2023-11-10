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

//Quan ly don hang

Route::get('/manage-order', 'CheckoutController@manage_order');
Route::get('/view-order/{orderID}','CheckoutController@view_order');
Route::get('/delete-order/{orderID}', 'CheckoutController@delete_order');

//Quan ly khách hang

Route::get('/manage-customer', 'CheckoutController@manage_customer');

//Users
Route::get('/','HomeController@index');

Route::get('/trang-chu','HomeController@index');
//timf kiem
Route::post('/tim-kiem','HomeController@search');

//Danh mục sản phẩm theo nhà xuat ban
Route::get('/loai-san-pham/{category_id}','QuanlyController@show_category_home');

//Chi tiet san pham
Route::get('/chi-tiet-san-pham/{product_id}','ProductController@details_product');

//luu gio hang
Route::post('/save-cart','CartController@save_cart');
Route::get('/show_cart','CartController@show_cart');
Route::get('/delete-to-cart/{rowId}','CartController@delete_to_cart');
Route::post('/update-cart-quantity','CartController@update_cart_quantity');

//checkout
Route::get('/login-checkout','CheckoutController@login_checkout');
Route::get('/logout-checkout','CheckoutController@logout_checkout');
Route::post('/add-customer','CheckoutController@add_customer');
Route::post('/order-place','CheckoutController@order_place');
Route::post('/login-customer','CheckoutController@login_customer');
Route::get('/checkout','CheckoutController@checkout');
Route::get('/payment','CheckoutController@payment');
Route::post('/save-checkout-customer','CheckoutController@save_checkout_customer');

//lienhe
Route::get('/contact','HomeController@contact');