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
    
    foreach (config('routes') as $group => $routes) {
        foreach ($routes as $route) {
            Route::{$route['method']}($group . '/' . $route['url'], Str::ucfirst($group) . 'Controller@' . $route['action'])->name($group . '.' . $route['action']);
        }
    }
});
