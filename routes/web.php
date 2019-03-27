<?php

use Illuminate\Support\Str;

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
    return redirect()->route('home.dashboard');
});

Route::get('login', 'LoginController@showLoginForm')->name('login');
Route::post('login', 'LoginController@login');

Route::middleware('auth')->group(function () {
    Route::post('logout', 'LoginController@logout')->name('logout');

    Route::name('home.')->group(function () {
        Route::get('dashboard', 'HomeController@dashboard')->name('dashboard');
    });

    Route::prefix('password')->name('password.')->group(function() {
    	Route::get('change', 'PasswordController@password')->name('change');
    	Route::put('change', 'PasswordController@change');
    });

    Route::prefix('log')->name('log.')->group(function() {
        Route::get('list', 'LogController@list')->name('list');
    });

    foreach (['user'] as $prefix) {
        Route::prefix($prefix)->name($prefix . '.')->group(function() use ($prefix) {
            Route::get('list', Str::ucfirst($prefix) . 'Controller@list')->name('list');
            Route::get('edit/{id}', Str::ucfirst($prefix) . 'Controller@edit')->name('edit');
        });
    }
/*
    Route::name('user.')->group(function () {
        Route::get('password', 'UserController@password')->name('password');
        Route::put('change-password', 'UserController@changePassword')->name('change');
    });*/
});
