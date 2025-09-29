<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController; // ← AGREGAR ESTA LÍNEA

Route::get('/', function () {
    return view('welcome');
});

// ← AGREGAR ESTAS LÍNEAS PARA EL CRUD
Route::resource('products', ProductController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
