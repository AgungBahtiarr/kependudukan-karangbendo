<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
Route::prefix('user')->group(function () {
    Route::get('', [UserController::class, 'index'])->middleware('can:read_users')->name('users.index');
    Route::post('/store', [UserController::class, 'store'])->middleware('can:create_users')->name('users.store');
});});
