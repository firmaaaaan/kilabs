<?php

use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('components.auth.login');
});
Route::get('/register', function () {
    return view('components.auth.register');
});
