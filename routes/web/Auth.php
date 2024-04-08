<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

Route::middleware('guest')->group(function () {
    Route::get("/admin/login", [AuthController::class, "login"])->name("login");
    Route::get("/logout", [AuthController::class, "logout"])->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::get("/logout", [AuthController::class, "logout"])->name('logout');
    Route::get('/profile', [AuthController::class, "profile"])->name('profile');
});
