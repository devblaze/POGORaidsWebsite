<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::get('findRaid', 'ApiController@test');
Route::get('raids', 'ApiController@index');
Route::get('raids/findRaid', 'ApiController@searchByName');
Route::get('raids/seconds', 'ApiController@getRaidSeconds');
Route::get('pokemon', 'ApiController@getPokemon');
