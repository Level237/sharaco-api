<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\LogoutController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\User\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('new/user',[RegisterController::class,'register']);
Route::post('login',[LoginController::class,"login"]);


Route::middleware(['auth:api'])->prefix('v1')->group(function(){

    Route::get('/user/me',[ProfileController::class,'currentUser']);
    Route::post('/logout',[LogoutController::class,'logout']);
});

