<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\SettingController;
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


Route::post('/login', [AuthController::class, 'login']);
Route::get('/get-all-services', [AuthController::class, 'get_all_services']);

Route::get('/get-setting', [SettingController::class, 'get_setting']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {


    return $request->user();
});
