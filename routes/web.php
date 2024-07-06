<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WargaController;
use App\Http\Middleware\CleanSession;
use Illuminate\Support\Facades\Route;

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
    // Data Kader
    Route::prefix('user')->group(function () {
        Route::get('', [UserController::class, 'index'])->middleware('can:read_users')->name('users.index');
        Route::post('store', [UserController::class, 'store'])->middleware('can:create_users')->name('users.store');
        Route::patch('/{user}/update', [UserController::class, 'update'])->middleware('can:update_users')->name('users.update');
        Route::patch('/{id}/status', [UserController::class, 'updateUserStatus'])->middleware('can:update_user_status')->name('users.status.update');
    });

    // Data Warga
    Route::prefix('warga')->group(function () {
        Route::get('', [WargaController::class, 'index'])->middleware('can:read_wargas', CleanSession::class)->name('wargas.index');

        Route::get('/create/1', [WargaController::class, 'create1'])->middleware('can:create_wargas',)->name('wargas.create1');
        Route::get('/create/2', [WargaController::class, 'create2'])->middleware('can:create_wargas')->name('wargas.create2');

        Route::post('/store/back', [WargaController::class, 'backTo'])->middleware('can:create_wargas')->name('wargas.back');
        Route::post('/store/1', [WargaController::class, 'store1'])->middleware('can:create_wargas')->name('wargas.store1');
        Route::post('/store', [WargaController::class, 'store'])->middleware('can:create_wargas')->name('wargas.store');

        Route::get('/edit/1/{id}', [WargaController::class, 'edit1'])->middleware('can:edit_wargas')->name('wargas.edit1');
        Route::get('/edit/2/{id}', [WargaController::class, 'edit2'])->middleware('can:edit_wargas')->name('wargas.edit2');

        Route::patch('/edit/back', [WargaController::class, 'backToEdit'])->middleware('can:edit_wargas')->name('wargas-edit.back');


        Route::patch('/update1', [WargaController::class, 'update1'])->middleware('can:update_wargas')->name('wargas.update1');
        Route::patch('/update', [WargaController::class, 'update'])->middleware('can:update_wargas')->name('wargas.update');

        Route::patch('/{id}/status', [WargaController::class, 'updateWargaStatus'])->middleware('can:update_wargas_status')->name('wargas.status.update');
    });
});
