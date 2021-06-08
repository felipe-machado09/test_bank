<?php


use Modules\User\Entities\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\AuthController;

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

Route::post('/auth/register', [AuthController::class, 'register']);

Route::post('/auth/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/auth/logout', [AuthController::class, 'logout']);
});
Route::middleware(['auth:sanctum'])->prefix('user')->group( function () {
    Route::get('/', 'UserController@index');
    Route::get('/list', 'UserController@list');
    Route::post('/', 'UserController@store');
    Route::get('/show/{id}', 'UserController@show');
    Route::put('/update/{id}', 'UserController@update');
    Route::delete('/delete/{id}', 'UserController@destroy');
});
