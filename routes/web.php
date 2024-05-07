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


Route::get('/', [ProductController::class, 'Allproduct'])->name('Produk.ListProduct');
Route::get('/tambah',function(){
    return view('Produk.tambah');
});
Route::get("/listProduct/{user_id}", [ProductController::class, 'show'])->name('Produk.ListProduct');
Route::get("/detailuser/{user_id}", [ProductController::class, 'detailUser']);
Route::resource('/EditProduct',editProductController::class);



