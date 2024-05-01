<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    public function index()
    {
        $data['producs'] = Produk::all();
        return view('Produk.index', $data);
    }

    public function tambah()
    {
        $data['producs'] = Produk::all();
        return view('Produk.tambah', $data);
    }

    public function store(Request $request)
    {
        // Validasi inputan
        $data = $request->validate([
            'Nama' => 'required|string',
            'Harga' => 'required|integer',
            'Stok' => 'required|integer',
            'Berat' => 'required|numeric',
            'Kondisi' => 'required|in:Baru,Bekas',
            'Deskripsi' => 'required|string',
            // Anda dapat menambahkan validasi untuk 'Gambar' jika diperlukan
        ]);

        // Membuat instance model Produk
        $producs = new Produk();
        $producs->Nama = $data['Nama'];
        $producs->Harga = $data['Harga'];
        $producs->Stok = $data['Stok'];
        $producs->Berat = $data['Berat'];
        $producs->Kondisi = $data['Kondisi'];
        $producs->Deskripsi = $data['Deskripsi'];
        
        
        if ($request->hasFile('Gambar')) {
            $image = $request->file('Gambar');
            $fileName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/gambar', $fileName);
            $producs->Gambar = $fileName;
        }

        // Menyimpan produk ke database
        $producs->save();

        return  redirect()->route('Produk.index');
    }

}
