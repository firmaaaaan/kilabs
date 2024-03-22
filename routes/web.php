<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DahsboardController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/postLogin', [AuthController::class, 'postLogin'])->name('postLogin');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', function () {
    return view('components.auth.register');
});
Route::group(['middleware'=>'auth'], function(){
    Route::get('/dashboard',[DahsboardController::class,'index']);
});
