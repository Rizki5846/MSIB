@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Product</h1>
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $product->nama }}" required>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" step="0.01" class="form-control" id="harga" name="harga" value="{{ $product->harga }}" required>
            </div>
            <div class="mb-3">
                <label for="stok" class="form-label">Stok</label>
                <input type="number" class="form-control" id="stok" name="stok" value="{{ $product->stok }}" required>
            </div>
            <div class="mb-3">
                <label for="berat" class="form-label">Berat</label>
                <input type="number" step="0.01" class="form-control" id="berat" name="berat" value="{{ $product->berat }}" required>
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <input type="file" class="form-control" id="gambar" name="gambar">
            </div>
            <div class="mb-3">
                <label for="kondisi" class="form-label">Kondisi</label>
                <select class="form-control" id="kondisi" name="kondisi" required>
                    <option value="baru" {{ $product->kondisi == 'baru' ? 'selected' : '' }}>Baru</option>
                    <option value="bekas" {{ $product->kondisi == 'bekas' ? 'selected' : '' }}>Bekas</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi">{{ $product->deskripsi }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update Product</button>
        </form>
    </div>
@endsection
