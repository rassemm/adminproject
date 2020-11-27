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

Route::get('/', function () {
    return view('admin.dashboard');
});
Route::resource('product','ProductController');
Route::get('/downloadPDF','ProductController@downloadPDF');
Route::resource('ajaxItems','ItemController');

Route::resource('crud','CrudsController');
Route::get('post','PostController@create');
Route::post('post','PostController@store');
Route::get('post.index','PostController@index');
Route::get('edit/{id}','PostController@edit');
Route::post('edit/{id}','PostController@update');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('user','UserController');
//Route::put('/user/{id}', 'UserController@update');