<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Product([
            'nama' => $row['nama'],
            'harga' => $row['harga'],
            'stok' => $row['stok'],
            'berat' => $row['berat'],
            'gambar' => $row['gambar'],
            'kondisi' => $row['kondisi'],
            'deskripsi' => $row['deskripsi'],
        ]);
    }
}
