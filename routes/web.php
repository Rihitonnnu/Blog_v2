<?php

use App\Http\Controllers\Visitor\ArticleController;
use App\Http\Controllers\User\Auth\GoogleLoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ArticleController::class, 'index'])->name('visitor.article.index');

Route::get('/show/{article}', [ArticleController::class, 'show'])->name('visitor.article.show');

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [GoogleLoginController::class, 'getGoogleAuth'])->name('login');
    Route::get('/auth/callback', [GoogleLoginController::class, 'authGoogleCallback']);

    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::get('/dashboard', function () {
    return view('user.dashboard');
})->name('dashboard');
