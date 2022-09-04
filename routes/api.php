<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ProductApiController;
use App\Http\Controllers\API\Auth\AuthUserController;

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

Route::post('/login', [AuthUserController::class, 'login']);
Route::post('/logout', [AuthUserController::class, 'logout'])->middleware('auth:api');


Route::group([
    'middleware' => ['api', 'auth:api'],

], function () {
    Route::post('/addProductStock', [ProductApiController::class, 'addProductStock']);
    Route::post('/reduceProductStock', [ProductApiController::class, 'reduceProductStock']);


});
