<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminDashController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(AdminAuthController::class)->prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', 'index')->name('index');
    Route::get('/forgot-password', 'forgotPassword')->name('forgot-password');
    Route::get('/reset-password', 'resetPassword')->name('reset-password');
});
Route::controller(AdminDashController::class)->prefix('admin')->name('admin.dash.')->group(function () {
    Route::get('/dashboard', 'index')->name('index');
});
Route::controller(UserController::class)->prefix('admin')->name('admin.users.')->group(function () {
    Route::get('/users', 'index')->name('index');
});
