<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontEndController;


Route::get('/', [FrontEndController::class, 'index'])->name('home');
Route::get('/singleProduct/{slug}', [FrontEndController::class, 'ShowSingleProduct'])->name('single.product');
Route::get('/category/{slug}', [FrontEndController::class, 'CategoryProduct'])->name('category.product');
Route::get('/brand/{slug}', [FrontEndController::class, 'BrandProduct'])->name('brand.product');

Route::get('/admin', [AdminController::class, 'admin'])->name('admin');

Route::resource('brands', BrandController::class);
Route::resource('tags', TagController::class);
Route::resource('category', CategoryController::class);
Route::resource('product', ProductController::class);



// Contact route
Route::resource('contact', ContactController::class);

Route::get('/contact-pdf', [ContactController::class, 'ContactPdf'])->name('contact.pdf');
Route::post('/contact-pdf', [ContactController::class, 'CreatePdf'])->name('create.pdf');



// Cart add route
Route::resource('cart', CartController::class);
// Order Invoice Route
Route::post('/confirm-order', [OrderController::class, 'store'])->name('order.store');




