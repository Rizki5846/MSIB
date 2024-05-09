<?php

use App\Http\Controllers\editProductController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::post('/{user}/post-request', [ProductController::class, 'postRequest'])->name('postRequest');
Route::get('/{user}/tambah-product', [ProductController::class, 'handleRequest'])->name('form_product');
Route::get('/products', [ProductController::class, 'getProduct'])->name('get_product');
Route::get('/{user}/product/{product}', [ProductController::class, 'editProduct'])->name('edit_product');
Route::put('/{user}/product/{product}/update', [ProductController::class, 'updateProduct'])->name('update_product');
Route::post('/{user}/product/{product}/delete', [ProductController::class, 'deleteProduct'])->name('delete_product');
Route::get('/profile/{user}', [ProductController::class, 'getProfile'])->name('get_profile');

Route::get('/admin/{user}/list-products', [ProductController::class, 'getAdmin'])->name('Produk.admin_page');
