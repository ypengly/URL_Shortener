<?php

use App\Http\Controllers\UrlController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| IMPORTANT: route order matters in Laravel.
| Routes are matched top to bottom, first match wins.
| The catch-all "/{shortCode}" route MUST be defined LAST,
| otherwise it would swallow /dashboard, /login, /register, etc.
|--------------------------------------------------------------------------
*/

// Homepage — shorten form lives here, open to everyone
Route::get('/', [UrlController::class, 'home'])->name('home');
Route::post('/shorten', [UrlController::class, 'store'])->name('urls.store');

// Everything below requires an authenticated user
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [UrlController::class, 'index'])->name('dashboard');
    Route::delete('/urls/{url}', [UrlController::class, 'destroy'])->name('urls.destroy');
});

// Breeze authentication routes (login, register, logout, etc.)
// This file is generated automatically when you install Breeze.
require __DIR__.'/auth.php';

// Redirect route — kept last on purpose (see note above).
// The {shortCode} pattern is restricted to letters/numbers, 6-8 chars,
// so it can never accidentally match a route defined above it.
Route::get('/{shortCode}', [UrlController::class, 'redirect'])
    ->where('shortCode', '[A-Za-z0-9]{6,8}')
    ->name('urls.redirect');
