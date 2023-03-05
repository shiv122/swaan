<?php

use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\Basic\DashboardController;
use App\Http\Controllers\Admin\Metadata\CategoryController;
use App\Http\Controllers\Admin\Metadata\RegionController;
use App\Http\Controllers\Admin\ProviderController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\User\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
| This is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" and "admin" middleware group. Now create something great!
|
*/

Route::controller(AuthController::class)->group(function () {
  Route::get('login', 'login')->name('login');
  Route::post('login', 'storeLogin');
  Route::get('logout', 'logout')->name('logout');
});


Route::middleware(['admin'])->group(function () {
  Route::controller(DashboardController::class)->group(function () {
    Route::get('/', 'index')->name('dashboard');
  });


  Route::controller(UserController::class)->prefix('users')->name('users.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('store', 'store')->name('store');
  });


  Route::controller(RegionController::class)->prefix('regions')->name('regions.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('store', 'store')->name('store');
  });

  Route::controller(CategoryController::class)->prefix('categories')->name('categories.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('store', 'store')->name('store');
  });


  Route::controller(SubCategoryController::class)->prefix('sub-categories')->name('sub-categories.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('store', 'store')->name('store');
  });

  Route::controller(ProviderController::class)->prefix('providers')->name('providers.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('store', 'store')->name('store');
  });
});
