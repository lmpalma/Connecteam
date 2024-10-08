<?php

use App\Middleware\IsAdmin;
use App\Middleware\IsEmployee;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ForgotPasswordController;

// Route::get('/', function () {
//     return view('welcome');
// });

// AUTHENTICATION ROUTES
Route::get('/',[HomeController::class,'index'])->name('frontend.home');
Route::get('/login',[AuthController::class,'loginPage'])->name('frontend.login');
Route::get('/signup',[AuthController::class,'signupPage'])->name('frontend.signup');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// FORGOT PASS ROUTES
Route::get('/forgot-password',[ForgotPasswordController::class,'forgotPassword'])->name('frontend.forgot-password');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/password/reset/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/password/reset', [ForgotPasswordController::class, 'reset'])->name('password.update');

// ADMIN/MANAGER ROUTES

Route::middleware(['isAdmin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // task routes
    Route::get('/admin/task/create',[AdminController::class,'create'])->name('admin.task.create');
    Route::get('/admin/task/index',[AdminController::class,'viewTasks'])->name('admin.task.index');

    // user crud routes
    Route::get('/admin/user/index',[AdminController::class,'viewUsers'])->name('admin.user.index');
    Route::get('/admin/user/create',[AdminController::class,'createUser'])->name('admin.user.create');
    Route::post('/admin/user/store',[AdminController::class,'storeUser'])->name('admin.user.store');


});

// EMPLOYEE ROUTES
Route::middleware(['isEmployee'])->group(function () {
    Route::get('/employee/dashboard', [EmployeeController::class, 'dashboard'])->name('employee.dashboard');
});