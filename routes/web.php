<?php

use App\Http\Controllers\UserController;
use App\Models\User;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('posts', 'App\Http\Controllers\PostController');
	Route::resource('roles', 'App\Http\Controllers\RoleController');
	Route::resource('users', 'App\Http\Controllers\UserController');
	Route::resource('permissions', 'App\Http\Controllers\PermissionController');
	Route::resource('categories', 'App\Http\Controllers\CategoryController');
});

