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
/**
 * Home Routes
 */
Route::get('/', 'HomeController@root')->name('root');
Route::get('/home', 'HomeController@index')->name('home');

/**
 * Raid controller routes.
 */
Route::get('/raids', 'RaidController@index')->name('raid_index');
Route::get('/test/{raid}', 'RaidController@destroy');

/**
 * Trainer controller routes.
 */
Route::get('/trainer', 'TrainerController@index')->name('trainer');
Route::post('/trainer/create', 'TrainerController@store')->name('trainer_store');
Route::get('/trainer/create', 'TrainerController@create')->name('trainer_create');

/**
 * Admin controller routes.
 */
Route::get('/admin/unauthorized', 'Admin\AdminController@unauthorized')->name('admin_unauthorized');
Route::middleware( 'access')->group(static function () {
    Route::get('/admin', 'Admin\AdminController@index')->name('admin');
    Route::get('/admin/users', 'Admin\AdminController@users')->name('admin_users');
    Route::post('/admin/users/update', 'Admin\AdminController@userUpdate')->name('admin_user_update');
    Route::get('/admin/users/{user}/edit', 'Admin\AdminController@userEdit');
    Route::get('/admin/accesslevels', 'Admin\AdminController@accessLevels')->name('admin_accesslevels');
    Route::get('/admin/trainers', 'Admin\AdminController@trainers')->name('admin_trainers');
    Route::get('/admin/raids', 'Admin\AdminController@raids')->name('admin_raids');
    Route::get('/admin/pokemon', 'Admin\AdminController@pokemon')->name('admin_pokemon');
});

/**
 * Routes that the guests need to be authenticated in order to access.
 */
Auth::routes();
Route::middleware('auth')->group(static function () {
    Route::post('/raids/create', 'RaidController@store')->name('raid_store');
    Route::get('/raids/create', 'RaidController@create')->name('raid_create');
    Route::get('/raids/{raid}', 'RaidController@show')->name('raid_show');
    Route::get('/raids/{raid}/edit', 'RaidController@edit')->name('raid_edit');
//    Route::get('/raids/{raid}/edit', 'RaidController@edit')->name('raid_edit')->where('any', '.*');
    Route::post('/raids/update', 'RaidController@update')->name('raid_update');
});
