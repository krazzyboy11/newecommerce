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

Route::get('/', 'EshopController@index')->name('/');
/*Route::get('/', 'EshopController@category')->name('/');*/
Route::get('/category_product/{id}', 'EshopController@categoryProduct')->name('category_product');
Route::get('/product_details/{id}', 'EshopController@productDetails')->name('product_details');
Route::post('/add/cart', 'CartController@addToCart')->name('add-to-cart');
Route::get('/cart/show', 'CartController@showCart')->name('show-cart');
Route::get('/cart/delete/{Id}', 'CartController@deleteCart')->name('delete-cart-item');
Route::get('/update/cart/', 'CartController@updateCart')->name('update_cart');
Route::post('/customer', 'CartController@customerRegister')->name('customer_registration');
Route::post('/checkout', 'CartController@shippingAddress')->name('shipping_address');



Auth::routes();

Route::get('/admin', 'HomeController@index')->name('admin.dashboard');



Route::group(['prefix'=>'admin','middleware'=>'auth','namespace'=>'Admin'], function (){
    Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');
    Route::resource('category','CategoryController');
    Route::resource('subcategory','SubCategoryController');
    Route::resource('childcategory','ChildCategoryController');
    Route::resource('brand','BrandController');
    Route::resource('product','ProductController');

});

