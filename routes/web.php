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
Route::get('/', function () {
    return view('index');
});
Route::get('/category', function () {
    return view('category');
});
Route::get('/admin',function (){
   return view('admin.index') ;
});
Route::get('/admin/category/list','App\Http\Controllers\CategoryController@list');
Route::get('/admin/category/create',function (){
   return view('admin.category.create') ;
});
Route::get('/admin/user/create',function (){
   return view('admin.user.create');
});
Route::post('/admin/category/save', 'App\Http\Controllers\CategoryController@save');
Route::get('admin/user/list','App\Http\Controllers\UserController@list');
Route::post('/admin/user/save', 'App\Http\Controllers\UserController@save');
