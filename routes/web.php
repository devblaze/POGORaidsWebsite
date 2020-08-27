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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/raids', 'RaidController@index')->name('raid_index');
//Route::get('/raids/findRaid', 'RaidsController@test');
Route::post('/raids/create', 'RaidController@store')->name('raid_store');
Route::get('/raids/create', 'RaidController@create')->name('raid_create');
Route::get('/raids/{raid}', 'RaidController@show')->name('raid_show');
Route::get('/raids/{raid}/edit', 'RaidController@edit')->name('raid_edit')->where('any', '.*');
Route::post('/raids/update', 'RaidController@update')->name('raid_update');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function () {
//    Auth routes here
});
