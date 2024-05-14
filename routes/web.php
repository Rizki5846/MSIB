<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserManagementController;

// Authentication routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Authenticated routes
Route::middleware('auth')->group(function () {
    Route::get('/products', [ProductController::class, 'index'])->name('products');
    
    Route::post('/{user}/post-request', [ProductController::class, 'postRequest'])->name('postRequest');
    Route::get('/{user}/tambah-product', [ProductController::class, 'handleRequest'])->name('form_product');
    Route::get('/products', [ProductController::class, 'getProduct'])->name('get_product');
    Route::get('/{user}/product/{product}', [ProductController::class, 'editProduct'])->name('edit_product');
    Route::put('/{user}/product/{product}/update', [ProductController::class, 'updateProduct'])->name('update_product');
    Route::post('/{user}/product/{product}/delete', [ProductController::class, 'deleteProduct'])->name('delete_product');
    Route::get('/profile/{user}', [ProductController::class, 'getProfile'])->name('get_profile');
    Route::get('/admin/{user}/list-products', [ProductController::class, 'getAdmin'])->name('products.admin_page');
  

    // Superadmin routes
    Route::middleware('role:superadmin')->group(function () {
        Route::get('/user-management', [UserManagementController::class, 'index'])->name('user-management');
        Route::get('/products', [ProductController::class, 'index'])->name('products');
    });
});


