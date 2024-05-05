<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

Route::get('/login', function () {
    return view('dashboard.auth.login');
});

Route::get('/' ,[HomeController::class , 'index'])->name('index')->middleware('auth');

Route::group(['as' => 'auth.'], function () {
    Route::get('/login', [AuthController::class , 'showLoginForm' ])->name('login');
    Route::post('/login', [AuthController::class , 'login' ])->name('postLogin');
    Route::get('/register', [AuthController::class , 'register' ])->name('register');
});

Route::resource('/user' , UserController::class)->middleware('auth');
