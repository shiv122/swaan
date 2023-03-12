<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Provider\Auth\AuthController;
use App\Http\Controllers\Api\Provider\BasicController;
use App\Http\Controllers\Api\Provider\ServiceController;
use App\Http\Controllers\Api\Provider\SlotController;

Route::controller(AuthController::class)
  ->middleware(['guest:provider'])
  ->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
  });


Route::controller(BasicController::class)
  ->middleware(['auth:provider'])
  ->group(function () {
    Route::get('/', 'profile');
    Route::get('categories', 'categories');
    // Route::get('/categories/{id}', 'subcategories');
  });

Route::middleware(['auth:provider', 'active'])->group(function () {
  Route::controller(ServiceController::class)->prefix('services')->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'store');
    Route::get('{service}', 'show');
    Route::put('{service}', 'update');
    Route::delete('{service}', 'destroy');
  });

  Route::controller(SlotController::class)->prefix('slots')->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'store');
    Route::delete('{slot}', 'destroy');
  });
});
