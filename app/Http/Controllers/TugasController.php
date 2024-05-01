<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakulikuler;
use Illuminate\Http\Request;

class TugasController extends Controller
{
    public function getForm()
    {
        return view('form_request');
    }

    public function postForm(Request $req)
    {
        if (!$req->filled('name')) {
            return redirect()->back()->with('error', 'Error. Field Nama Produk Wajib diisi.');
        } else if (!$req->filled('berat')) {
            return redirect()->back()->with('error', 'Error. Field Berat Wajib diisi.');
        } else if (!$req->filled('harga')) {
            return redirect()->back()->with('error', 'Error. Field Harga Wajib diisi.');
        } else if (!$req->filled('stok')) {
            return redirect()->back()->with('error', 'Error. Field Stok Wajib diisi.');
        } else if ($req->kondisi == 0) {
            return redirect()->back()->with('error', 'Error. Field Kondisi Wajib diisi.');
        } else if (!$req->filled('deskripsi')) {
            return redirect()->back()->with('error', 'Error. Field Deskripsi Wajib diisi.');
        }


        $data = [
            [
                'image' => 'https://assets.klikindomaret.com/products/20075742/20075742_1.jpg',
                'nama' => 'Sikat Gigi',
                'berat' => 100,
                'harga' => 4000,
                'kondisi' => 'Baru',
                'deskripsi' => 'Sikat gigi ini dapat membersihkan kuman-kuman yang ada pada gigi dan gusi kamu',
                'stok' => 12,
            ],
            [
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSu22v_99ImrZj6RuaQt-F6nHRZYkCUNQEyOpMVDvzHrw&s',
                'nama' => 'Sabun Mandi',
                'berat' => 250,
                'harga' => 7000,
                'kondisi' => 'Baru',
                'deskripsi' => 'Sabun mandi yang ampuh membersihkan badan dari bakteri akibat keringat setelah beraktivitas',
                'stok' => 200,
            ],
            [
                'image' => 'https://images-cdn.ubuy.co.id/64f07850e7d397721505a2f8-head-and-shoulders-dandruff-shampoo.jpg',
                'nama' => 'Shampoo',
                'berat' => 500,
                'harga' => 15000,
                'kondisi' => 'Baru',
                'deskripsi' => 'Shampoo active membunuh ketombe dan membuat rambutmu panjang, lebat dan juga sehat',
                'stok' => 50,
            ],
            [
                'image' => 'https://img.freepik.com/premium-photo/new-product-label-print-sticker-3d-illustration_473931-425.jpg',
                'nama' => $req->name,
                'berat' => $req->berat,
                'harga' => $req->harga,
                'kondisi' => $req->kondisi,
                'deskripsi' => $req->deskripsi,
                'stok' => $req->stok,
            ],
        ];

        return view('products_catalog', ['products' => $data]);
    }
}
