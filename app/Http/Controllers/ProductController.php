<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Excel as ExcelExcel;
use Maatwebsite\Excel\ExcelServiceProvider;

class ProductController extends Controller
{
  
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }
    public function show()
    {
        $products = Product::all();
        return view('products.admin', compact('products'));
    }
    public function show1(Product $product)
    {
        return view('products.detail', compact('product'));
    }


    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'berat' => 'required|numeric',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kondisi' => 'required|in:baru,bekas',
            'deskripsi' => 'nullable',
        ]);
    
        $data = $request->all();
    
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('images', 'public');
        }
    
        Product::create($data);
        return redirect()->route('products.index');
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'berat' => 'required|numeric',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kondisi' => 'required|in:baru,bekas',
            'deskripsi' => 'nullable',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            if ($product->gambar) {
                Storage::delete('public/' . $product->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('images', 'public');
        }

        $product->update($data);
        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        if ($product->gambar) {
            Storage::delete('public/' . $product->gambar);
        }

        $product->delete();
        return redirect()->route('products.index');
    }
    public function export()
    {
        return Excel::download(new ProductsExport, 'products.xlsx');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        Excel::import(new ProductsImport, $request->file('file'));

        return redirect()->route('products.index')->with('success', 'Products imported successfully.');
    }

    public function checkout(Product $product)
    {
        $invoice_number = 'INV-' . now()->format('Ymd') . '-' . rand(1000, 9999);
    
        // Periksa keunikan nomor invoice
        while (Transaction::where('invoice_number', $invoice_number)->exists()) {
            $invoice_number = 'INV-' . now()->format('Ymd') . '-' . rand(1000, 9999);
        }
    
        // Logika untuk membuat transaksi dan menyimpannya ke database
        $transaction = new Transaction();
        $transaction->invoice_number = $invoice_number;
        $transaction->unique_code = rand(1000, 9999);
        $transaction->expiry_date = now()->addDays(7); // Contoh: tanggal kadaluarsa 7 hari dari sekarang
        // Tambahkan logika lain sesuai kebutuhan
        $transaction->save();
    
        // Redirect ke halaman detail transaksi dengan memberikan ID produk dan ID transaksi
        return redirect()->route('products.checkout', ['product' => $product->id, 'transaction' => $transaction->id]);
    }
    
}
