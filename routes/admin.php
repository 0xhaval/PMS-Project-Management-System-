<?php

use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\GroupController;
use App\Http\Controllers\Backend\ProjectController;
use App\Http\Controllers\Backend\ProjectTypeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ResultController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/', [HomeController::class, 'adminDash'])->name('home');
    Route::resource('user', UserController::class);
    Route::resource('group', GroupController::class);
    Route::resource('project', ProjectController::class);
    Route::resource('projectType', ProjectTypeController::class);
    Route::get('student/info', [HomeController::class, 'studentInfo'])->name('student.info');
    Route::get('result', [ResultController::class, 'indexAdmin'])->name('project.result');
});
