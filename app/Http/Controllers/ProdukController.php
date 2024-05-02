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
    public function menu()
    {
        $data['producs'] = Produk::all();
        return view('Produk.menu', $data);
    }

    public function tambah()
    {
        $data['producs'] = Produk::all();
        return view('Produk.tambah', $data);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'Nama' => 'required|string',
            'Harga' => 'required|integer',
            'Stok' => 'required|integer',
            'Berat' => 'required|numeric',
            'Kondisi' => 'required|in:Baru,Bekas',
            'Deskripsi' => 'required|string',
            
        ]);

        
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

        
        $producs->save();

        return  redirect()->route('Produk.menu');
    }

    public function edit(string $id)
    {
        $data['producs'] = Produk::find($id);
        return view('Produk.edit', $data);
    }

    public function update(Request $request, $id)
        {
            
            $data = $request->validate([
                'Nama' => 'required|string',
                'Harga' => 'required|integer',
                'Stok' => 'required|integer',
                'Berat' => 'required|numeric',
                'Kondisi' => 'required|in:Baru,Bekas',
                'Deskripsi' => 'required|string',
            ]);

            
            $producs = Produk::findOrFail($id);
            $producs->update([
                'Nama' => $data['Nama'],
                'Harga' => $data['Harga'],
                'Stok' => $data['Stok'],
                'Berat' => $data['Berat'],
                'Kondisi' => $data['Kondisi'],
                'Deskripsi' => $data['Deskripsi'],
            ]);

            // Jika ada gambar baru diupload, simpan gambar tersebut
            if ($request->hasFile('Gambar')) {
                $image = $request->file('Gambar');
                $fileName = time() . '_' . $image->getClientOriginalName();
                $image->storeAs('public/gambar', $fileName);
                $producs->Gambar = $fileName;
                $producs->save();
            }

            // Redirect kembali ke halaman produk setelah berhasil melakukan update
            return redirect()->route('Produk.menu')->with('success', 'Produk berhasil diupdate.');
        }
        public function destroy($id)
        {
            $produk = Produk::findOrFail($id);
            $produk->delete();
            return redirect()->route('Produk.menu')->with('success', 'Produk berhasil dihapus');
        }

        


}
