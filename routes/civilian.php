<?php

use App\Http\Controllers\AgreementController;
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
    Route::post('/', 'login')->name('login');
    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'store')->name('store');
    Route::get('/forgot-password', 'forgotPassword')->name('forgot-password');
    Route::get('/reset-password', 'resetPassword')->name('reset-password');
});
Route::middleware('civilian')->group(function () {
    Route::get('/logout', [CivilianAuthController::class,'logout'])->name('logout');
Route::controller(CivilianDashController::class)->prefix('civilian')->name('dash.')->group(function () {
    Route::get('/dashboard', 'index')->name('index');
    Route::get('/profile', 'profile')->name('profile');
    Route::put('/profile/update', 'updateProfile')->name('updateProfile');
    Route::get('/security', 'security')->name('security');
    Route::put('/change-password', 'changePassword')->name('changePassword');
    Route::get('/delete-account', 'deleteAccount')->name('delete-account');
    Route::delete('/delete-account', 'deleteAccountStore')->name('delete-account-store');
});
Route::controller(AgreementController::class)->prefix('agreement')->name('agreement.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/show', 'show')->name('show');
    Route::get('/create', 'create')->name('create');
    Route::post('/upload', 'upload')->name('upload');
});
});
