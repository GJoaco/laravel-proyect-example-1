<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

Route::view('', 'home')->name('home');
Route::view('about', 'about')->name('about');
Route::view('contact', 'contact')->name('contact');
Route::view('dashboard', 'dashboard')->name('dashboard');

Route::resource('posts', PostController::class);

Route::view('login', 'auth.login')->name('login')->middleware('guest');
Route::post('login', [AuthenticatedSessionController::class, 'store']);

Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::view('register', 'auth.register')->name('register')->middleware('guest');
Route::post('register', [RegisteredUserController::class, 'store']);

