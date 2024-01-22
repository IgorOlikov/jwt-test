<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BasicAuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

   Route::prefix('auth')->middleware('web')->group(function (){
      Route::post('register',[BasicAuthController::class,'store']);
   });

//public
    Route::apiResource('/posts', PostController::class);
    Route::apiResource('/posts/{post}/comments',CommentController::class);
    Route::apiResource('/profile', ProfileController::class)->only('index');

//auth
Route::prefix('auth')->middleware('api')->group(function () {
    Route::post('login', [AuthController::class,'login']);
    Route::post('logout', [AuthController::class,'logout']);
    Route::post('refresh', [AuthController::class,'refresh']);
    Route::post('me', [AuthController::class,'me']);
});
