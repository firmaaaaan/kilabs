<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DahsboardController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/postLogin', [AuthController::class, 'postLogin'])->name('postLogin');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/registerPost', [AuthController::class, 'registerPost'])->name('registerPost');

Route::group(['middleware'=>'auth'], function(){
    Route::get('/dashboard',[DahsboardController::class,'index']);
});
