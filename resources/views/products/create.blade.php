@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add Product</h1>
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" step="0.01" class="form-control" id="harga" name="harga" required>
            </div>
            <div class="mb-3">
                <label for="stok" class="form-label">Stok</label>
                <input type="number" class="form-control" id="stok" name="stok" required>
            </div>
            <div class="mb-3">
                <label for="berat" class="form-label">Berat</label>
                <input type="number" step="0.01" class="form-control" id="berat" name="berat" required>
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <input type="file" class="form-control" id="gambar" name="gambar">
            </div>
            <div class="mb-3">
                <label for="kondisi" class="form-label">Kondisi</label>
                <select class="form-control" id="kondisi" name="kondisi" required>
                    <option value="baru">Baru</option>
                    <option value="bekas">Bekas</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add Product</button>
        </form>
    </div>
@endsection
