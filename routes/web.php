<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('login/google', [LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [LoginController::class, 'handleGoogleCallback']);

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/show', [ProductController::class, 'show'])->name('products.admin');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
Route::get('/products/export', [ProductController::class, 'export'])->name('products.export');
Route::post('/products/import', [ProductController::class, 'import'])->name('products.import');
Route::get('/products/{product}', [ProductController::class, 'show1'])->name('products.detail');
Route::get('/products/{product}/checkout', [ProductController::class, 'checkout'])->name('products.checkout');


Route::middleware(['auth', 'role:admin'])->group(function () {
    // Rute-rute yang hanya dapat diakses oleh admin
     Route::get('/admin/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/admin/products', [ProductController::class, 'store'])->name('admin.products.store');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
