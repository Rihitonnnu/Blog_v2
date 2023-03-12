<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\GoogleLoginController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::middleware('guest')->group(function () {
    Route::get('/welcome', function () {
        return Inertia::render('Welcome');
    });
    Route::get('/', [ArticleController::class, 'getVisitorIndex'])->name('visitor.article.index');
    Route::get('visitor/article/{article}', [ArticleController::class, 'getVisitorShow'])->name('visitor.article.show');
    Route::get('login', [GoogleLoginController::class, 'getGoogleAuth'])->name('login');
    Route::get('logout', [GoogleLoginController::class, 'logout'])->name('logout');
    Route::get('/auth/callback', [GoogleLoginController::class, 'authGoogleCallback']);
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resource('article', ArticleController::class);
});
