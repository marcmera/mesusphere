<?php

use App\Http\Middleware\isAdmin;
use App\Http\Middleware\isStudent;
use App\Http\Middleware\isTeacher;
use Illuminate\Support\Facades\Route;

Route::redirect('/', 'login');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    // admin routes
    Route::middleware([isAdmin::class])->prefix('admin')->group(function () {
        Route::view('/dashboard', 'admin.dashboard')->name('admin.dashboard');
    });

    // student routes
    Route::middleware(isStudent::class)->prefix('student')->group(function () {
        Route::view('/dashboard', 'student.dashboard')->name('dashboard');
    });

    // teacher routes
    Route::middleware(isTeacher::class)->prefix('teacher')->group(function () {
        Route::view('/dashboard', 'teacher.dashboard')->name('dashboard');
    });
});
