<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BasicAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

   Route::prefix('auth')->middleware('web')->group(function (){
      Route::post('register',[BasicAuthController::class,'store']);
   });


Route::prefix('auth')->middleware('api')->group(function () {
    Route::post('login', [AuthController::class,'login']);
    Route::post('logout', [AuthController::class,'logout']);
    Route::post('refresh', [AuthController::class,'refresh']);
    Route::post('me', [AuthController::class,'me']);

});
