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

Route::middleware('auth:api')->get('/user', function() {
    return auth()->user();
});
Route::middleware('auth:api')->get('/admin', function() {
    return auth()->user();
});
Route::post('login',[LoginController::class,'login']);
Route::post('register',[LoginController::class,'signup']);
Route::post('update',[ProfileController::class,'update'])->name('update');