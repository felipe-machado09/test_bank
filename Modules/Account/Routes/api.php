<?php

use Illuminate\Http\Request;

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

Route::middleware(['auth:sanctum'])->prefix('account')->group( function () {
    Route::get('/', 'AccountController@index');
    Route::get('/list', 'AccountController@list');
    Route::post('/', 'AccountController@store');
    Route::get('/show/{id}', 'AccountController@show');
    Route::put('/update/{id}', 'AccountController@update');
    Route::delete('/delete/{id}', 'AccountController@inactivate');
});
