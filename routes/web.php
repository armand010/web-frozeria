<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('categories', CategoryController::class);
Route::resource('items', ItemController::class);

Route::get('/help', function () {
    return view('help.index');
})->name('help');
