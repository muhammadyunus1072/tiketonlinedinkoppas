<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Page\PageController;

Route::middleware('guest')->group(function () {
    Route::middleware('eligible')->group(function () {
        Route::get("/register", [PageController::class, "register"])->name("register");
    });
    Route::get('/generate/{id}', [PageController::class, 'generate'])->name('generate');
    Route::get('/', [PageController::class, 'index'])->name('index');
});

