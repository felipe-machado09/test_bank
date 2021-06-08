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

Route::middleware(['auth:sanctum'])->prefix('transaction')->group( function () {
    Route::get('/', 'TransactionController@index');
    Route::get('/list', 'TransactionController@list');
    Route::post('/', 'TransactionController@store');
    Route::get('/show/{id}', 'TransactionController@show');
    Route::put('/update/{id}', 'TransactionController@update');
    Route::delete('/delete/{id}', 'TransactionController@inactivate');
});
