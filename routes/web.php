<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::view('/','home');

Route::get('/register',[AuthController::class,'showRegister'])->name('register');

Route::post('/register',[AuthController::class,'register']);

Route::get('/login',[AuthController::class,'showLogin']);

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

Route::view('/dashboard', 'dashboard')
    ->middleware('auth')
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('tasks',TaskController::class)->except(['show']);
});