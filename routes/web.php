<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use GuzzleHttp\Handler\Proxy;

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

Route::get('/', function () {
    return view('welcome');
});




Route::get('/produk', [ProdukController::class, 'index'])->name('Produk.index');
Route::get('/Produk/tambah', [ProdukController::class, 'tambah'])->name('Produk.tambah');
Route::post('/Produk', [ProdukController::class, 'store'])->name('Produk.store');