<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontEndController;

Route::get('/', [FrontEndController::class, 'index'])->name('home');
Route::get('/admin', [AdminController::class, 'admin'])->name('admin');
Route::resource('brands', BrandController::class);
Route::resource('tags', TagController::class);
Route::resource('category', CategoryController::class);
