@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $product->nama }}</div>

                <div class="card-body">
                    <img src="{{ asset('storage/gambar/' . $product->gambar) }}" class="img-fluid mb-3" alt="{{ $product->nama }}">
                    <p><strong>Harga:</strong> Rp. {{ number_format($product->harga, 0, ',', '.') }}</p>
                    <p><strong>Stok:</strong> {{ $product->stok }}</p>
                    <p><strong>Berat:</strong> {{ $product->berat }} gr</p>
                    <p><strong>Kondisi:</strong> {{ $product->kondisi }}</p>
                    <p><strong>Deskripsi:</strong> {{ $product->deskripsi }}</p>
                    <!-- Tombol untuk kembali ke halaman sebelumnya -->
                    <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
                    <!-- Dalam card-body -->
                    <a href="{{ route('products.checkout', ['product' => $product->id]) }}" class="btn btn-primary">Checkout</a>





                </div>
            </div>
        </div>
    </div>
</div>
@endsection
