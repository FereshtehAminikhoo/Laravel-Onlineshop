<?php

use Illuminate\Support\Facades\Route;

//client routes
Route::get('/login', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});
Route::get('/','App\Http\Controllers\ClientController@index' )->name('client_home');
Route::get('/category/{id}', 'App\Http\Controllers\ClientController@showCategory')->name('show_category');
Route::get('/product/{id}', 'App\Http\Controllers\ClientController@showProduct')->name('show_product');
Route::get('/product/{id}/add_to_cart','App\Http\Controllers\ClientController@addToCart')->name('add_product_to_cart');
Route::get('/shopping_cart','App\Http\Controllers\ClientController@showShoppingCart')->name('show_shopping_cart');
Route::get('/shopping_cart/delete_item/{id}', 'App\Http\Controllers\ClientController@deleteItem')->name('delete_item');
Route::get('/shopping_cart/finalize_payment', 'App\Http\Controllers\ClientController@finalizePayment')->name('finalize_payment');
Route::get('/payment_order/list', 'App\Http\Controllers\ClientController@paymentOrder')->name('payment_order');
Route::get('/payment_order_item/list', 'App\Http\Controllers\ClientController@paymentOrderItem')->name('payment_order_item');

//admin routes
Route::get('/admin',function (){
   return view('admin.index') ;
})->name('admin_home')->middleware(['auth','is_admin']);
Route::get('/admin/category/list','App\Http\Controllers\CategoryController@list')->name('category_list');
Route::get('/admin/category/create','App\Http\Controllers\CategoryController@create')->name('category_create');
Route::get('/admin/user/create',function (){
   return view('admin.user.create');
});
Route::post('/admin/category/save', 'App\Http\Controllers\CategoryController@save');
Route::get('admin/user/list','App\Http\Controllers\UserController@list')->name('user_list');
Route::post('/admin/user/save', 'App\Http\Controllers\UserController@save');

Route::get('/admin/category/{id}/edit','App\Http\Controllers\CategoryController@edit')->name('category_edit');
Route::post('/admin/category/{id}/update','App\Http\Controllers\CategoryController@update')->name('category_update');

Route::get('/admin/category/{id}/delete','App\Http\Controllers\CategoryController@delete')->name('category_delete');


Route::get('/admin/user/{id}/edit', 'App\Http\Controllers\UserController@edit')->name('user_edit');
Route::post('/admin/user/{id}/update', 'App\Http\Controllers\UserController@update')->name('user_update');
Route::get('/admin/user/{id}/delete', '\App\Http\Controllers\UserController@delete')->name('user_delete');

Route::get('/admin/product/create', function(){
    return view('admin.product.create');
});
Route::get('/admin/product/create', '\App\Http\Controllers\ProductController@create')->name('product_create');
Route::post('/admin/product/save', 'App\Http\Controllers\ProductController@save');
Route::get('/admin/product/list', 'App\Http\Controllers\ProductController@list')->name('product_list');
Route::get('/admin/product/{id}/edit', 'App\Http\Controllers\ProductController@edit')->name('product_edit');
Route::post('/admin/product/{id}/update', '\App\Http\Controllers\ProductController@update')->name('product_update');
Route::get('/admin/product/{id}/delete', 'App\Http\Controllers\ProductController@delete')->name('product_delete');

Route::get('/admin/login','App\Http\Controllers\AdminAuthController@showLoginForm')->name('admin_login_form');
Route::post('/admin/login','App\Http\Controllers\AdminAuthController@login')->name('admin_login');


Route::get('/admin/brand/create', function (){
    return view('admin.brand.create');
});
Route::get('admin/brand/create', 'App\Http\Controllers\BrandController@create')->name('brand_create');
Route::post('admin/brand/save', 'App\Http\Controllers\BrandController@save');
Route::get('admin/brand/list', 'App\Http\Controllers\BrandController@list')->name('brand_list');
Route::get('admin/brand/{id}/edit', 'App\Http\Controllers\BrandController@edit')->name('brand_edit');
Route::post('admin/brand/{id}/update', 'App\Http\Controllers\BrandController@update')->name('brand_update');
Route::get('admin/brand/{id}/delete', 'App\Http\Controllers\BrandController@delete')->name('brand_delete');
Route::get('admin/payment_order/list', 'App\Http\Controllers\Payment_orderController@list')->name('payment_order_list');
Route::get('admin/payment_order_item/list/{id}', 'App\Http\Controllers\Payment_order_itemController@list')->name('payment_order_item_list');
//auth routes
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//auth user routes
Route::get('/client/login','App\Http\Controllers\ClientController@showLoginForm')->name('client_login');
Route::get('/client/register', 'App\Http\Controllers\ClientController@showRegisterForm')->name('client_register');
Route::post('/client/createAccount', 'App\Http\Controllers\ClientController@createAccount')->name('client_createAccount');
