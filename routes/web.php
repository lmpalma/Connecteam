<?php

use App\Middleware\IsAdmin;
use App\Middleware\IsEmployee;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ForgotPasswordController;

// AUTHENTICATION ROUTES
Route::get('/',[HomeController::class,'index'])->name('frontend.home');
Route::get('/login',[AuthController::class,'loginPage'])->name('frontend.login');
Route::get('/signup',[AuthController::class,'signupPage'])->name('frontend.signup');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/verify-email/{code}', [AuthController::class, 'verifyEmail'])->name('verify.email');


// FORGOT PASS ROUTES
Route::get('/forgot-password',[ForgotPasswordController::class,'forgotPassword'])->name('frontend.forgot-password');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/password/reset/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/password/reset', [ForgotPasswordController::class, 'reset'])->name('password.update');

// ADMIN/MANAGER ROUTES

Route::middleware(['isAdmin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/notifications', [AdminController::class, 'viewNotifications'])->name('admin.notifications');
    Route::get('/admin/notifications/fetch', [AdminController::class, 'fetchNotifications'])->name('admin.notifications.fetch');
    Route::delete('/admin/notifications/{id}', [AdminController::class, 'deleteNotif'])->name('admin.notifications.delete');

    // task routes
    Route::get('/admin/task/create',[AdminController::class,'create'])->name('admin.task.create');
    Route::get('/admin/task/index',[AdminController::class,'viewTasks'])->name('admin.task.index');
    Route::post('/admin/task/store', [AdminController::class, 'storeTask'])->name('admin.task.store');
    Route::get('admin/task/{id}/edit', [AdminController::class, 'editTask'])->name('admin.task.edit');
    Route::put('admin/task/{id}', [AdminController::class, 'updateTask'])->name('admin.task.update');
    Route::delete('/admin/task/{id}', [AdminController::class, 'deleteTask'])->name('admin.task.delete');
    Route::get('/admin/task-files/download/{id}', [AdminController::class, 'downloadTaskFile'])->name('admin.task.files.download');

    // user crud routes
    Route::get('/admin/user/index',[AdminController::class,'viewUsers'])->name('admin.user.index');
    Route::get('/admin/user/create',[AdminController::class,'createUser'])->name('admin.user.create');
    Route::post('/admin/user/store',[AdminController::class,'storeUser'])->name('admin.user.store');
    Route::get('/admin/user/{id}/edit', [AdminController::class, 'editUser'])->name('admin.user.edit');
    Route::put('/admin/user/{id}', [AdminController::class, 'updateUser'])->name('admin.user.update');
    Route::delete('/admin/user/{id}', [AdminController::class, 'deleteUser'])->name('admin.user.delete');

    Route::get('/admin/export/users', [AdminController::class, 'exportUsers'])->name('admin.export.users');
    Route::get('/admin/export/tasks', [AdminController::class, 'exportTasks'])->name('admin.export.tasks');
    Route::get('/admin/export/combined', [AdminController::class, 'exportCombined'])->name('admin.export.combined');

});

// EMPLOYEE ROUTES

Route::middleware(['isEmployee'])->group(function () {
    Route::get('/employee/dashboard', [EmployeeController::class, 'dashboard'])->name('employee.dashboard');
    Route::get('/employee/notifications', [EmployeeController::class, 'viewNotifications'])->name('employee.notifications');
    Route::get('/employee/notifications/fetch', [EmployeeController::class, 'fetchNotifications'])->name('employee.notifications.fetch');
    Route::delete('/employee/notifications/{id}', [EmployeeController::class, 'deleteNotif'])->name('employee.notifications.delete');

    // task routes
    Route::get('/employee/task/index', [EmployeeController::class, 'myTasks'])->name('employee.task.index');
    Route::get('/employee/task/{id}/edit', [EmployeeController::class, 'editTask'])->name('employee.task.edit');
    Route::put('/employee/task/{id}', [EmployeeController::class, 'updateTask'])->name('employee.task.update');
    Route::get('/employee/task-files/download/{id}', [EmployeeController::class, 'downloadTaskFile'])->name('employee.task.files.download');

    // profile routes
    Route::get('/employee/profile', [EmployeeController::class, 'viewProfile'])->name('employee.profile.index');
    Route::get('/employee/profile/edit', [EmployeeController::class, 'editProfile'])->name('employee.profile.edit');
    Route::put('/employee/profile/update', [EmployeeController::class, 'updateProfile'])->name('employee.profile.update');

});