<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\User\BasicController;
use App\Http\Controllers\Api\User\Auth\AuthController;


Route::controller(AuthController::class)->group(function () {
  Route::post('login', 'login');
});


Route::controller(AuthController::class)->middleware(['auth:sanctum'])->group(function () {

  Route::controller(BasicController::class)->group(function () {
    Route::get('/', 'profile');
    Route::get('categories', 'categories');
    Route::get('services', 'services');
  });
});
