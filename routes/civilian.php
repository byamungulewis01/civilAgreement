<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CivilianAuthController;
use App\Http\Controllers\CivilianDashController;

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

Route::controller(CivilianAuthController::class)->name('auth.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/register', 'register')->name('register');
    Route::get('/forgot-password', 'forgotPassword')->name('forgot-password');
    Route::get('/reset-password', 'resetPassword')->name('reset-password');

});
Route::controller(CivilianDashController::class)->prefix('civilian')->name('civilian.dash.')->group(function () {
    Route::get('/dashboard', 'index')->name('index');
});
