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

Route::group(['middleware' => ['auth']], function() {
	//General Website Management
	Route::get('/general-settings', 'OrganizationManagement\SettingController@generalSettings')->name('generalSettings');
    Route::post('/general-settings', 'OrganizationManagement\SettingController@updateGeneralSettings')->name('updateGeneralSettings');
	//Env Management
	Route::get('get-env', 'OrganizationManagement\SettingController@getEnv')->name('getEnv');
    Route::post('get-env', 'OrganizationManagement\SettingController@saveEnv')->name('saveEnv');
    //Database Management
    Route::get('/update-database', 'OrganizationManagement\SettingController@getUpdateDatabase')->name('updatedatabase');
    Route::post('/update-database', 'OrganizationManagement\SettingController@postUpdateDatabase')->name('updatedatabase.post');
});