<?php

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

Route::resource('/', \App\Http\Controllers\HomeController::class);
Route::resource('articles', \App\Http\Controllers\ArticlesController::class);
Route::resource('auth', \App\Http\Controllers\UserAuth::class);
Route::post('auth/login', [\App\Http\Controllers\UserAuth::class, 'auth'])->name('auth');
Route::post('auth/register', [\App\Http\Controllers\UserAuth::class, 'register'])->name('register');
Route::post('auth/logout/{id}', [\App\Http\Controllers\UserAuth::class, 'logout'])->name('logout');
Route::post('auth/personal/{id}/articles', [\App\Http\Controllers\ArticlesController::class, 'userArticles'])->name('personal-articles');
Route::post('auth/personal/{id}', [\App\Http\Controllers\UserAuth::class, 'show'])->name('personal-area');
