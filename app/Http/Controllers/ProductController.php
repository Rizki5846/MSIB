<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Toko;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function index()
        {
            $products = Product::all(); 
            return view('products.index', ['products' => $products]);
        }
    public function getAdmin(User $user)
    {
        $products = Product::where('user_id', $user->id)->get();
        return view('products.admin_page', ['products' => $products, 'user' => $user]);
    }

    public function editProduct(Request $request, User $user, Product $product)
    {
        return view('products.edit_product', ['product' => $product, 'user' => $user]);
    }

    public function updateProduct(Request $request, User $user, Product $product)
    {
        // Validasi input
        $request->validate([
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nama' => 'required',
            'berat' => 'required|numeric',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'kondisi' => 'required',
            'deskripsi' => 'required',
        ]);
    
        // Cek apakah pengguna memiliki hak akses untuk memperbarui produk
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->storeAs(
                'public/gambar',
                'gambar' . time() . '.' . $request->file('gambar')->extension()
            );
            $product->gambar = basename($path);
        }
    
        // Memperbarui atribut produk sesuai dengan data yang diterima dari permintaan
        $product->nama = $request->nama;
        $product->stok = $request->stok;
        $product->berat = $request->berat;
        $product->harga = $request->harga;
        $product->deskripsi = $request->deskripsi;
        $product->kondisi = $request->kondisi;
        // Simpan lokasi gambar yang diunggah
        // $product->gambar = $gambarPath; // Remove this line as it's unnecessary
        $product->save();
    
        // Redirect ke halaman yang sesuai dengan pesan sukses
        return redirect()->route('products.admin_page', ['user' => $user->id])->with('message', 'Berhasil update data');
    }
    


    public function deleteProduct(Request $request, User $user, Product $product)
    {
        if ($product->user_id === $user->id) {
            $product->delete();
        }
        return redirect()->back()->with('status', 'Berhasil menghapus data');
    }


    public function handleRequest(Request $request, User $user)
    {
        return view('products.handle_request', ['user' => $user]);
    }
    public function postRequest(Request $request, User $user)
    {
        // Validasi data
        $validatedData = $request->validate([
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Gambar bisa kosong atau harus berupa gambar dengan maksimum 2MB
            'nama' => 'required|string|max:255',
            'berat' => 'required|numeric|min:0',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'kondisi' => 'required|in:Bekas,Baru',
            'deskripsi' => 'required|string',
        ]);
    
        // Simpan data produk ke database
        $product = new Product();
        $product->user_id = $user->id;
        $product->nama = $validatedData['nama'];
        $product->berat = $validatedData['berat'];
        $product->harga = $validatedData['harga'];
        $product->kondisi = $validatedData['kondisi'];
        $product->stok = $validatedData['stok'];
        $product->deskripsi = $validatedData['deskripsi'];
    
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->storeAs(
                'public/gambar',
                'gambar' . time() . '.' . $request->file('gambar')->extension()
            );
            $product->gambar = basename($path);
        }
    
        $product->save();
    
        // Redirect ke halaman terkait
        return redirect()->route('products.admin_page', ['user' => $user->id]);
    }

    public function getProduct()
    {
        // $data = Product::all();
        $user = User::find(1);
        $data = $user->products;
        // return view('list_product')->with('products', $data);
        return view('products.products')->with('products', $data);
    }


    public function getProfile(Request $request, User $user)
    {
        $user = User::with('profile')->find($user->id);
        // dd($user);
        return view('products.profile', ['user' => $user]);
    }

}
