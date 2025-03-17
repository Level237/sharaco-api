<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Admin\UserController;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\User\QuoteController;
use App\Http\Controllers\Api\Auth\LogoutController;
use App\Http\Controllers\Api\User\ClientController;
use App\Http\Controllers\Api\User\CountryController;
use App\Http\Controllers\Api\User\ProfileController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\Guard\ProfessionController;
use App\Http\Controllers\Api\Guard\ListCountryController;

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

Route::post('register',[RegisterController::class,'register']);
Route::post('login',[LoginController::class,"login"]);
Route::get('professions',[ProfessionController::class,'index']);
Route::get('refresh',[LoginController::class,'refresh']);
Route::get('/countries',[ListCountryController::class,'index']);
Route::middleware(['auth:api','scopes:admin'])->prefix('v1')->group(function(){

    Route::apiResource('/users',UserController::class);

});



Route::middleware(['auth:api'])->prefix('v1')->group(function(){

    Route::apiResource('/clients',ClientController::class);
    Route::apiResource('/quotes',QuoteController::class);
    Route::get('/user/me',[ProfileController::class,'currentUser']);
    Route::post('/logout',[LogoutController::class,'logout']);
});

