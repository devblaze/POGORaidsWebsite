<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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
 * Home Routes.
 */
Route::get('/', [HomeController::class, 'root'])->name('root');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/unauthorized', [HomeController::class, 'unauthorized'])->name('unauthorized');

/**
 * Raid controller routes.
 */
Route::get('/raids', 'RaidController@index')->name('raid_index');
//Route::get('/test/{raid}', 'RaidController@destroy');


/**
 * Admin controller routes.
 */
Route::middleware( 'auth')->group(static function () {
    Route::get('/admin', 'Admin\AdminController@index')->name('admin');
    Route::get('/admin/users', 'Admin\AdminController@users')->name('admin_users');
    Route::post('/admin/users/update', 'Admin\AdminController@userUpdate')->name('admin_user_update');
    Route::get('/admin/users/{user}/edit', 'Admin\AdminController@userEdit');
    Route::get('/admin/accesslevels', 'Admin\AdminController@accessLevels')->name('admin_accesslevels');
    Route::get('/admin/trainers', 'Admin\AdminController@trainers')->name('admin_trainers');
    Route::get('/admin/raids', 'Admin\AdminController@raids')->name('admin_raids');
    Route::get('/admin/pokemon', 'Admin\AdminController@pokemon')->name('admin_pokemon');
    Route::get('/admin/bugreports', 'Admin\AdminController@bugreports')->name('admin_bug_reports');
});

/**
 * Routes that the guests need to be authenticated in order to access.
 */
Auth::routes();
Route::middleware('auth')->group(static function () {
    /**
     * User Controller Routes.
     */
    Route::get('/user/{user}/edit', 'UserController@edit')->name('user_edit');
    Route::post('/user/update', 'UserController@update')->name('user_update');

    /**
     * Raid Controller Routes.
     */
    Route::post('/raids/create', 'RaidController@store')->name('raid_store');
    Route::get('/raids/create', 'RaidController@create')->name('raid_create');
    Route::get('/raids/{raid}', 'RaidController@show')->name('raid_show');
    Route::get('/raids/{raid}/edit', 'RaidController@edit')->name('raid_edit');
//    Route::get('/raids/{raid}/edit', 'RaidController@edit')->name('raid_edit')->where('any', '.*');
    Route::post('/raids/update', 'RaidController@update')->name('raid_update');

    /**
     * Bug Report controller Routes.
     */
    Route::get('/bugReport', 'BugReportController@index')->name('bug_report');
    Route::post('/bugReport/create', 'BugReportController@store')->name('bug_report_store');
    Route::get('/bugReport/create', 'BugReportController@create')->name('bug_report_create');

    /**
     * Pokemon controller routes.
     */
    Route::get('/pokemon', 'PokemonController@index')->name('pokemon_index');
    Route::post('/pokemon/create', 'PokemonController@store')->name('pokemon_store');
    Route::get('/pokemon/create', 'PokemonController@create')->name('pokemon_create');

    /**
     * Trainer controller routes.
     */
    Route::get('/trainer', 'TrainerController@index')->name('trainer');
    Route::post('/trainer/create', 'TrainerController@store')->name('trainer_store');
    Route::get('/trainer/create', 'TrainerController@create')->name('trainer_create');
//    Route::get('/trainer/{trainer}', 'TrainerController@show')->name('trainer_show');
    Route::get('/trainer/{trainer}/edit', 'TrainerController@edit')->name('trainer_edit');
    Route::post('/trainer/update', 'TrainerController@update')->name('trainer_update');
});
