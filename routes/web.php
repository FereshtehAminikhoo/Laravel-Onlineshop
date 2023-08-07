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

Route::get('/login', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});
Route::get('/','App\Http\Controllers\ClientController@index' )->name('home');
Route::get('/category', function () {
    return view('category');
});
Route::get('/admin',function (){
   return view('admin.index') ;
})->name('admin_home');
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
