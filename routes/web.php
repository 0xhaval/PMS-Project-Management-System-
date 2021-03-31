<?php

use App\Http\Controllers\ResultController;
use Illuminate\Support\Facades\Route;
require __DIR__.'/admin.php';

Route::get('/', [ResultController::class, 'index'])->name('home');
Route::post('/send/{user}', [ResultController::class, 'store'])->name('store');
Auth::routes();
