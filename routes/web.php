<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[HomeController::class,'index'])->name('frontend.home');
Route::get('/login',[AuthController::class,'login'])->name('frontend.login');
Route::get('/signup',[AuthController::class,'signup'])->name('frontend.signup');

