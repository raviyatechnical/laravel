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
//Cache Problem
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear ');
    Artisan::call('view:clear ');
    return "Cache is cleared";
});

Route::get('/', function () {
    //return view('welcome');
    return redirect()->route('login');
});

Auth::routes();
//Auth::routes(['verify' => true]); // email verfity 



Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','UserManagement\RoleController');
    Route::resource('users','UserManagement\UserController');
});
