<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;

use App\Http\Controllers\admin\StudentController;
use App\Http\Controllers\admin\GradeController;
use App\Http\Controllers\admin\DepartmentController;
use App\Http\Controllers\admin\DashboardController;

//web.php
Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index']);
Route::get('/contact', [ContactController::class, 'index']);

Route::get('/grade', [GradeController::class, 'index']);

//admin route
Route::prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index']);

    // Student Admin Routes
    Route::prefix('students')->group(function () {
        Route::get('/', [\App\Http\Controllers\admin\StudentController::class, 'index']);
        Route::get('/create', [\App\Http\Controllers\admin\StudentController::class, 'create']);
        Route::post('/store', [\App\Http\Controllers\admin\StudentController::class, 'store']);
        Route::get('/edit/{student}', [\App\Http\Controllers\admin\StudentController::class, 'edit']);
        Route::put('/update/{student}', [\App\Http\Controllers\admin\StudentController::class, 'update']);
        Route::delete('/delete/{student}', [\App\Http\Controllers\admin\StudentController::class, 'destroy']);
    });

    Route::prefix('grades')->group(function () {
        Route::get('/', [\App\Http\Controllers\admin\GradeController::class, 'index']);
        Route::get('/create', [\App\Http\Controllers\admin\GradeController::class, 'create']);
        Route::post('/store', [\App\Http\Controllers\admin\GradeController::class, 'store']);
        Route::get('/edit/{grade}', [\App\Http\Controllers\admin\GradeController::class, 'edit']);
        Route::put('/update/{grade}', [\App\Http\Controllers\admin\GradeController::class, 'update']);
       // Route::delete('/delete/{grade}', [GradeAdminController::class, 'destroy']);
    });

    Route::prefix('departments')->group(function () {
        Route::get('/', [\App\Http\Controllers\admin\DepartmentController::class, 'index']);
        Route::get('/create', [\App\Http\Controllers\admin\DepartmentController::class, 'create']);
        Route::post('/store', [\App\Http\Controllers\admin\DepartmentController::class, 'store']);
        Route::get('/edit/{department}', [\App\Http\Controllers\admin\DepartmentController::class, 'edit']);
        Route::put('/update/{department}', [\App\Http\Controllers\admin\DepartmentController::class, 'update']);
        //Route::delete('/delete/{department}', [DepartmentAdminController::class, 'destroy']);
    });
});
