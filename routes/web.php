<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\ClassModelController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    // Route quản lý sinh viên
    Route::resource('students', StudentController::class);

    // Route quản lý lớp học
    Route::resource('classes', ClassModelController::class);
});




// Các tuyến đường xác thực
Route::get('/login', [AuthenticatedSessionController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'login']);
Route::post('/logout', [AuthenticatedSessionController::class, 'logout'])->name('logout');

Route::get('/register', [AuthenticatedSessionController::class, 'registerForm'])->name('register');
Route::post('/register', [AuthenticatedSessionController::class, 'register']);

// Xác minh email
Route::get('/email/verify', [AuthenticatedSessionController::class, 'verifyEmailNotice'])->middleware('auth')->name('verification.notice');
Route::post('/email/verify/resend', [AuthenticatedSessionController::class, 'resendVerificationEmail'])->middleware('auth')->name('verification.resend');