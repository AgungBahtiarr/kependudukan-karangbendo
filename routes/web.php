<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

Route::prefix('auth')->group(function () {
    // Login
    Route::prefix('login')->group(function () {
        Route::get('', [AuthController::class, 'index'])->middleware('guest')->name('login');
        Route::post('', [AuthController::class, 'login'])->middleware('guest');
    });

    // Logout
    Route::get('logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');
});

Route::middleware('auth')->group(function () {
    // Data User
    Route::prefix('user')->group(function () {
        Route::get('', [UserController::class, 'index'])->middleware('can:read_users')->name('users.index');
        Route::post('store', [UserController::class, 'store'])->middleware('can:create_users')->name('users.store');
        Route::patch('/{user}/update', [UserController::class, 'update'])->middleware('can:update_users')->name('users.update');
        Route::patch('/{id}/status', [UserController::class, 'updateUserStatus'])->middleware('can:update_user_status')->name('users.status.update');
    });
});
