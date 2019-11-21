<?php

Route::get('login', 'Auth\LoginController@showLogin')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('postLogin');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/logout', function () {
    Session::flush();
    Auth::logout();
    return redirect(\URL::previous());
})->name('logout');

Route::get('/', 'DashboardController@initialScreen')->middleware('auth')->name('dashboard');


Route::prefix('user')->middleware('auth')->group(function () {
    Route::middleware('admin')->get('/', 'UserController@getAll')->name('getAllUsers');
    Route::post('/', 'UserController@create')->name('createUser');
    Route::put('/{id}', 'UserController@update')->name('updateUser');
    Route::get('/profile/{id}', 'UserController@getProfile')->name('getProfile');
    Route::get('/{id}', 'UserController@getOne')->name('getOneUser');
});

Route::prefix('provider/category')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', 'ProviderCategoryController@getAll')->name('getAllProviderCategories');
    Route::post('/', 'ProviderCategoryController@create')->name('createProviderCategory');
    Route::put('/{id}', 'ProviderCategoryController@update')->name('updateProviderCategory');
});

Route::prefix('provider')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', 'ProviderController@getAll')->name('getAllProviders');
    Route::post('/', 'ProviderController@create')->name('createProvider');
    Route::put('/{id}', 'ProviderController@update')->name('updateProvider');
    Route::get('/{id}', 'ProviderController@getOne')->name('getOneProvider');
});


Route::prefix('event/category')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', 'EventCategoryController@getAll')->name('getAllEventCategories');
    Route::post('/', 'EventCategoryController@create')->name('createEventCategory');
    Route::put('/{id}', 'EventCategoryController@update')->name('updateEventCategory');
});

Route::prefix('event')->middleware('auth')->group(function () {
    Route::get('/', 'EventController@getAll')->name('getAllEvents');
    Route::get('/completed', 'EventController@getCompleted')->name('getCompleted');
    Route::middleware('admin')->post('/', 'EventController@create')->name('createEvent');
    Route::post('/{id}', 'EventController@update')->name('updateEvent');
    Route::get('/{id}', 'EventController@getOne')->name('getOneEvent');

    Route::get('/{id}/settings', 'EventController@viewSettings')->name('settings');
    Route::post('/{id}/settings', 'EventController@update')->name('updateEvent');

    Route::post('/{id}/integration', 'EventController@addAccountToEvent')->name('accountIntegration');
    Route::delete('/{id}/integration', 'EventController@deleteAccountFromEvent')->name('accountRemove');

    Route::get('/{id}/budget', 'BudgetController@getBudget')->name('budgetGeneral');

    Route::put('/{id}/provider/{provider_id}', 'BudgetController@updateEventProvider')->name('updateEventProvider');
    Route::get('/{id}/provider', 'BudgetController@getEventProviders')->name('eventProviders');
    Route::post('/{id}/provider', 'BudgetController@addEventProvider')->name('addEventProvider');
    Route::delete('/{id}/provider', 'BudgetController@deleteEventProvider')->name('deleteEventProvider');

    Route::put('/{id}/task/{task_id}', 'BudgetController@updateEventProvider')->name('updateEventProvider');
    Route::get('/{id}/task', 'TaskController@getEventTasks')->name('getEventTasks');
    Route::post('/{id}/task', 'BudgetController@addEventProvider')->name('addEventProvider');
    Route::delete('/{id}/task', 'BudgetController@deleteEventProvider')->name('deleteEventProvider');
});
