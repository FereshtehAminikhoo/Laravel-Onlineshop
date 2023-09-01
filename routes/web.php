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
Route::get('/shopping_cart/add_product_to_cart', 'App\Http\Controllers\ClientController@changeCartCount')->name('change_cart_count');
Route::get('/payment_order/list', 'App\Http\Controllers\ClientController@paymentOrder')->name('payment_order');

Route::get('/search_in_products', 'App\Http\Controllers\ClientController@searchInProducts')->name('search_in_products');

Route::get('/payment_order_item/list/{id}', 'App\Http\Controllers\ClientController@paymentOrderItem')->name('payment_order_item');
Route::get('contact_us', 'App\Http\Controllers\ClientController@contactUs')->name('contact_us');
Route::get('forget_password', 'App\Http\Controllers\ClientController@forgetPassword')->name('forget_password');
Route::post('reset_password', 'App\Http\Controllers\ClientController@resetPassword')->name('reset_password');
Route::get('payment_order/{id}/invalidate', 'App\Http\Controllers\ClientController@invalidate')->name('client_payment_order_invalidate');

//admin routes
Route::get('/admin',function (){
   return view('admin.index') ;
})->name('admin_home')->middleware(['auth','is_admin']);
Route::get('/admin/category/list','App\Http\Controllers\CategoryController@list')->name('category_list')->middleware(['auth','is_admin']);;
Route::get('/admin/category/create','App\Http\Controllers\CategoryController@create')->name('category_create')->middleware(['auth','is_admin']);;
Route::get('/admin/user/create',function (){
   return view('admin.user.create');
})->middleware(['auth','is_admin']);;
Route::post('/admin/category/save', 'App\Http\Controllers\CategoryController@save')->middleware(['auth','is_admin']);;
Route::get('admin/user/list','App\Http\Controllers\UserController@list')->name('user_list')->middleware(['auth','is_admin']);;
Route::post('/admin/user/save', 'App\Http\Controllers\UserController@save')->middleware(['auth','is_admin']);;

Route::get('/admin/category/{id}/edit','App\Http\Controllers\CategoryController@edit')->name('category_edit')->middleware(['auth','is_admin']);;
Route::post('/admin/category/{id}/update','App\Http\Controllers\CategoryController@update')->name('category_update')->middleware(['auth','is_admin']);;

Route::get('/admin/category/{id}/delete','App\Http\Controllers\CategoryController@delete')->name('category_delete')->middleware(['auth','is_admin']);;


Route::get('/admin/user/{id}/edit', 'App\Http\Controllers\UserController@edit')->name('user_edit')->middleware(['auth','is_admin']);;
Route::post('/admin/user/{id}/update', 'App\Http\Controllers\UserController@update')->name('user_update')->middleware(['auth','is_admin']);;
Route::get('/admin/user/{id}/delete', '\App\Http\Controllers\UserController@delete')->name('user_delete')->middleware(['auth','is_admin']);;

Route::get('/admin/product/create', function(){
    return view('admin.product.create');
})->middleware(['auth','is_admin']);
Route::get('/admin/product/create', '\App\Http\Controllers\ProductController@create')->name('product_create')->middleware(['auth','is_admin']);;
Route::post('/admin/product/save', 'App\Http\Controllers\ProductController@save')->middleware(['auth','is_admin']);;
Route::get('/admin/product/list', 'App\Http\Controllers\ProductController@list')->name('product_list')->middleware(['auth','is_admin']);;
Route::get('/admin/product/{id}/edit', 'App\Http\Controllers\ProductController@edit')->name('product_edit')->middleware(['auth','is_admin']);;
Route::post('/admin/product/{id}/update', '\App\Http\Controllers\ProductController@update')->name('product_update')->middleware(['auth','is_admin']);;
Route::get('/admin/product/{id}/delete', 'App\Http\Controllers\ProductController@delete')->name('product_delete')->middleware(['auth','is_admin']);;


Route::get('/admin/brand/create', function (){
    return view('admin.brand.create');
})->middleware(['auth','is_admin']);;
Route::get('admin/brand/create', 'App\Http\Controllers\BrandController@create')->name('brand_create')->middleware(['auth','is_admin']);;
Route::post('admin/brand/save', 'App\Http\Controllers\BrandController@save')->middleware(['auth','is_admin']);;
Route::get('admin/brand/list', 'App\Http\Controllers\BrandController@list')->name('brand_list')->middleware(['auth','is_admin']);;
Route::get('admin/brand/{id}/edit', 'App\Http\Controllers\BrandController@edit')->name('brand_edit')->middleware(['auth','is_admin']);;
Route::post('admin/brand/{id}/update', 'App\Http\Controllers\BrandController@update')->name('brand_update')->middleware(['auth','is_admin']);;
Route::get('admin/brand/{id}/delete', 'App\Http\Controllers\BrandController@delete')->name('brand_delete')->middleware(['auth','is_admin']);;
Route::get('admin/payment_order/list', 'App\Http\Controllers\PaymentOrderController@list')->name('payment_order_list')->middleware(['auth','is_admin']);;
Route::get('admin/payment_order/{id}/invalidate', 'App\Http\Controllers\PaymentOrderController@invalidate')->name('payment_order_invalidate')->middleware(['auth','is_admin']);;
Route::get('admin/payment_order_item/list/{id}', 'App\Http\Controllers\PaymentOrderItemController@list')->name('payment_order_item_list')->middleware(['auth','is_admin']);;
//auth routes
Auth::routes();

Route::get('/password/reset','App\Http\Controllers\Auth\ForgotPasswordController@showResetPasswordForm')->name('password_reset_form');
Route::get('/password/reset/verify/code','App\Http\Controllers\Auth\ForgotPasswordController@sendVerifyCode')->name('forget_password_send_email');
Route::post('/password/reset/verify/code/check','App\Http\Controllers\Auth\ForgotPasswordController@checkVerifyCode')->name('forget_password_check_verify_code');
Route::post('/password/reset/password/change','App\Http\Controllers\Auth\ForgotPasswordController@changePassword')->name('change_password');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//auth user routes
Route::get('/client/login','App\Http\Controllers\ClientController@showLoginForm')->name('client_login');
Route::get('/client/register', 'App\Http\Controllers\ClientController@showRegisterForm')->name('client_register');
Route::post('/client/createAccount', 'App\Http\Controllers\ClientController@createAccount')->name('client_createAccount');
