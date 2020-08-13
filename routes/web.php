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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin/login', 'Auth\AdminAuthController@getLogin')->name('admin.login');
Route::post('admin/login', 'Auth\AdminAuthController@postLogin')->name('admin.post');
Route::post('admin/logut', 'Auth\AdminAuthController@postLogout')->name('admin.logout');

Route::group(['prefix' => 'admin', 'middleware' => ['auth:admin']], function () {
    Route::get('/', 'Admin\AdminController@index')->name('admin.index');

    //category
    Route::get('/category/trashed', 'Admin\CategoryController@getTrashed')->name('category.trashed');
    Route::delete('/category/trahsed/{id}', 'Admin\CategoryController@kill')->name('category.kill');
    Route::get('/category/trashed/{id}/restore', 'Admin\CategoryController@restore')->name('category.restore');
    Route::resource('/category', 'Admin\CategoryController');


    //product
    Route::get('/product/trashed', 'Admin\ProductController@getTrashed')->name('product.trashed');
    Route::get('/product/trashed/{id}/restore', 'Admin\ProductController@restore')->name('product.restore');
    Route::delete('/product/trashed/{id}', 'Admin\ProductController@kill')->name('product.kill');
    Route::resource('/product', 'Admin\ProductController');
});
