<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


Route::get('/', function () { return view('default'); });

// role routes
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function() {
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('user');
    Route::get('/deleted', [App\Http\Controllers\UserController::class, 'archive']);
    });

// product crud routes
Route::resource("/products", ProductController::class);
Route::resource("/all-products", HomeController::class);
Route::delete('/products/deleted', [ProductController::class, 'destroy'])->withTrashed();
Route::put('/products/restore/{id}', [ProductController::class, 'restore'])->withTrashed();

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



