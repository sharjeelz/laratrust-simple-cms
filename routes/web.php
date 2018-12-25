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

// Route::get('/', function () {
//     return view('welcome');
// });

 //Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('users','SystemUserController@index');

Route::get('roles','SystemUserController@Rolesindex');
Route::get('permissions','SystemUserController@Permissionsindex');

Route::get('role/create','SystemUserController@createRole');
Route::post('role','SystemUserController@storeRole');

Route::get('permission/create','SystemUserController@createPermission');
Route::post('permission', 'SystemUserController@storePermission');

Route::get('register','Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('user/create', 'Auth\RegisterController@register');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');



