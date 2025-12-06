<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontEndController;


// Route::get('/', [FrontEndController::class, 'index'])->name('home');
// Route::get('/singleProduct/{slug}', [FrontEndController::class, 'ShowSingleProduct'])->name('single.product');
// Route::get('/categories/{slug}', [FrontEndController::class, 'CategoryProduct'])->name('category.product');
// Route::get('/brand/{slug}', [FrontEndController::class, 'BrandProduct'])->name('brand.product');


// FrontEndController
Route::controller(FrontEndController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/singleProduct/{slug}', 'ShowSingleProduct')->name('single.product');
    Route::get('/categories/{slug}', 'CategoryProduct')->name('category.product');
    Route::get('/brand/{slug}', 'BrandProduct')->name('brand.product');
});



// Backend as a Admin
Route::middleware('Admin.loggedin')->group(function(){
    Route::get('/admin', [AdminController::class, 'admin'])->name('admin');
    Route::resource('brands', BrandController::class);
    Route::resource('tags', TagController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);


    // Contact route
    Route::resource('contact', ContactController::class);

    Route::get('/contact-pdf', [ContactController::class, 'ContactPdf'])->name('contact.pdf');
    Route::post('/contact-pdf', [ContactController::class, 'CreatePdf'])->name('create.pdf');
});






Route::middleware('IsNotAuthenticate.All.lUser')->group( function(){
    // add Cart route
    Route::resource('cart', CartController::class);
    // Order Invoice Route
    Route::post('/confirm-order', [OrderController::class, 'store'])->name('order.store');



    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/logout', [FrontEndController::class, 'index'])->name('home');
});




// Auth route
Route::middleware('isAuthenticateMiddleware')->group( function(){
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.store');

    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.store');
});







