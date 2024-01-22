<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BasicAuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/register',BasicAuthController::class);
