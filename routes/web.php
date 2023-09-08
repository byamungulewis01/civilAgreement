<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CivilAgreements;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminDashController;
use App\Http\Controllers\CivilianRegistration;

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
    Route::post('/login', 'login')->name('login');
    Route::get('/forgot-password', 'forgotPassword')->name('forgot-password');
    Route::post('/forgot-password', 'sendMail')->name('sendMail');
    Route::get('/mail-sent', 'sendMailSuccess')->name('sendMailSuccess');
    Route::get('/reset-password', 'resetPassword')->name('reset-password')->middleware('auth');
    Route::put('/reset-password/{id}', 'changePasswordStore')->name('changePasswordStore');

});
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/logout', [AdminAuthController::class,'logout'])->name('logout');

Route::controller(AdminDashController::class)->name('dash.')->group(function () {
    Route::get('/dashboard', 'index')->name('index');
    Route::get('/profile', 'profile')->name('profile');
    Route::put('/profile/update', 'updateProfile')->name('updateProfile');
    Route::get('/security', 'security')->name('security');
    Route::put('/change-password', 'changePassword')->name('changePassword');
    Route::get('/delete-account', 'deleteAccount')->name('delete-account');
    Route::delete('/delete-account', 'deleteAccountStore')->name('delete-account-store');
});
Route::controller(UserController::class)->prefix('users')->name('users.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/active', 'active')->name('active');
    Route::get('/inactive', 'inactive')->name('inactive');
    Route::get('/disactive', 'disactive')->name('disactive');
    Route::post('/', 'store')->name('store');
    Route::put('/{id}', 'update')->name('update');
    Route::put('/activate/{id}', 'activate')->name('activate');
    Route::delete('/{id}', 'destroy')->name('destroy');
});
Route::controller(CivilianRegistration::class)->name('civilian.')->group(function () {
    Route::get('/civilian', 'index')->name('index');
    Route::get('/civilian/active', 'active')->name('active');
    Route::get('/civilian/inactive', 'inactive')->name('inactive');
    Route::get('/civilian/disactive', 'disactive')->name('disactive');
    Route::post('/civilian', 'store')->name('store');
    Route::put('/civilian/{id}', 'update')->name('update');
    Route::put('/civilian/activate/{id}', 'activate')->name('activate');
    Route::delete('/civilian/{id}', 'destroy')->name('destroy');
});

Route::controller(CivilAgreements::class)->prefix('agreements')->name('agreements.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/pending', 'pending')->name('pending');
    Route::get('/fail', 'fail')->name('fail');
    Route::get('/completed', 'completed')->name('completed');
});
});
