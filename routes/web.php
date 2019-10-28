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

Route::get('login', 'Auth\LoginController@showLogin')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('postLogin');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/logout', function () {
    Session::flush();
    Auth::logout();
    return redirect(\URL::previous());
})->name('logout');

Route::get('/', 'DashboardController@initialScreen')->middleware('auth')->name('dashboard');


Route::prefix('users')->middleware('auth')->group(function () {
    Route::get('/', 'UserController@getAll')->name('getAllUsers');
    Route::post('/', 'UserController@create')->name('createUser');
    Route::put('/{id}', 'UserController@update')->name('updateUser');
    Route::get('/{id}', 'UserController@getOne')->name('getOneUser');
    Route::delete('/{id}', 'UserController@delete')->name('deleteUser');
});

Route::prefix('event')->middleware('auth')->group(function () {
    Route::get('/', 'EventController@getAll')->name('getAllEvents');
    /*Route::post('/', 'EventController@create')->name('createEvent');
    Route::put('/{id}', 'EventController@update')->name('updateEvent');
    Route::get('/{id}', 'EventController@getOne')->name('getOneEvent');
    Route::delete('/{id}', 'EventController@delete')->name('deleteEvent');*/
});

Route::prefix('event/category')->middleware('auth')->group(function () {
    Route::get('/', 'EventCategoryController@getAll')->name('getAllEventCategories');
    Route::post('/', 'EventCategoryController@create')->name('createEventCategory');
    Route::put('/{id}', 'EventCategoryController@update')->name('updateEventCategory');
});

Route::prefix('provider/category')->middleware('auth')->group(function () {
    Route::get('/', 'ProviderCategoryController@getAll')->name('getAllProviderCategories');
    Route::post('/', 'ProviderCategoryController@create')->name('createProviderCategory');
    Route::put('/{id}', 'ProviderCategoryController@update')->name('updateProviderCategory');
});
