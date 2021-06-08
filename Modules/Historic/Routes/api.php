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

Route::middleware(['auth:sanctum'])->prefix('historic')->group( function () {
    Route::get('/', 'HistoricController@index');
    Route::get('/list', 'HistoricController@list');
    Route::post('/', 'HistoricController@store');
    Route::get('/show/{id}', 'HistoricController@show');
    Route::put('/update/{id}', 'HistoricController@update');
    Route::delete('/delete/{id}', 'HistoricController@destroy');
});
