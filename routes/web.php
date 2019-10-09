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

Route::get('/', 'DashboardController@initialScreen');


Route::prefix('users')->group(function () {
    Route::get('/', 'UserController@getAll')->name('getAllUsers');
    Route::get('/{id}', 'UserController@getOne')->name('getOneUser');
    Route::post('/', 'UserController@create')->name('createUser');
    Route::put('/{id}', 'UserController@update')->name('updateUser');
    Route::delete('/{id}', 'UserController@delete')->name('deleteUser');
});
