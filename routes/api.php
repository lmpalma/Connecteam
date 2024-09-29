<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ForgotPass;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//authentication
Route::post('/admin/register', [AdminController::class, 'register']);
Route::post('/admin/login',[AdminController::class,'login'] );
Route::post('/admin/logout', [AdminController::class, 'logout'])->middleware('auth:sanctum');

Route::post('/employee/register', [EmployeeController::class, 'register']);
Route::post('/employee/login', [EmployeeController::class, 'login']);
Route::post('/employee/logout', [EmployeeController::class, 'logout']);

Route::post('/forgot-password', [ForgotPass::class, 'forgotPassword'])->name('password.email');
Route::post('/reset-password', [ForgotPass::class, 'reset'])->name('password.reset');
