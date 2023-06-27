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


Route::get('customer', [App\Http\Controllers\CustomerController::class, 'index']);

Route::get('customerData', [App\Http\Controllers\CustomerTTHController::class, 'index']);

Route::get('customerSearch/{customerId}', [App\Http\Controllers\CustomerTTHController::class, 'show']);
Route::post('customerTerima/{terimaTolak}/{alasan}/{customerId}', [App\Http\Controllers\CustomerTTHController::class, 'update']);


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
