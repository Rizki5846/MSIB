<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Toko;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function produk(Request $request){
    $rules = [
        'gambar_produk' => "Gambar Produk",
        'nama_produk' => 'Nama Produk',
        'berat_produk' => 'Berat Produk',
        'harga_produk' => 'Harga Produk',
        'stok' => 'Stok',
        'kondisi_barang' => 'Kondisi Barang',
        'deskripsi' => 'Deskripsi',
    ];
    
    foreach ($rules as $inputName => $label) {
        if ($request->$inputName === null) {
            return redirect()->back()->withInput()->withErrors(['error' => "$label tidak boleh kosong."]);
        }
    }
    
    // Tambahkan data produk yang baru dimasukkan ke dalam array $data
    $newProduct = [
        'gambar' => $request->gambar_produk,
        'nama' => $request->nama_produk,
        'berat' => $request->berat_produk,
        'harga' => $request->harga_produk,
        'stok' => $request->stok,
        'kondisi' => $request->kondisi_barang,
        'deskripsi' => $request->deskripsi,
    ];
    // memasukan kedalam database:
    Product::insert($newProduct);
    
    return redirect()->route('Produk.ListProduk');
}

public function show($id_user){
    $produk = Product::where('id_user', $id_user)->get();
    return view('Produk.ListProduct',[
        'product'=> $produk,
        'user_id' =>$id_user
    ]);
}

public function detailUser($id_user) {
    // Cari pengguna berdasarkan ID
    $user = User::find($id_user);

    // Cari toko berdasarkan ID pengguna
    // Asumsi bahwa ID pengguna dan ID toko adalah sama
    $toko = Toko::where('user_id', $id_user)->first();

    // Kirim data pengguna dan toko ke tampilan
    return view('Produk.detailUser', [
        'user_id' => $user,
        'toko' => $toko,
    ]);
}




public function Allproduct(){
    $produk = Product::all();
    return view('Produk.index',[
        'product'=> $produk
    ]);
}

}
