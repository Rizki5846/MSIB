@extends('layouts.app')

@section('content')
<div class="container mt-lg-4 mb-lg-3">
    <div class="row bg-info rounded px-3 py-3 w-100">
        <div class="d-flex justify-content-between">
            <h2 class="fw-semibold">List Product</h2>
            <div class="d-flex justify-content-end">
                
                <a href="{{ route('products.create') }}" class="btn btn-md btn-dark fw-bold my-auto me-1">Tambah
                    Produk</a>
                <a href="{{ route('products.index') }}" class="btn btn-md btn-secondary fw-bold my-auto">Kembali ke Produk</a>
                <a href="{{ route('products.export') }}" class="btn btn-md btn-secondary fw-bold my-auto">Export Products</a>
                <form action="{{ route('products.import') }}" method="POST" enctype="multipart/form-data" class="mb-3">
                    @csrf
                    <input type="file" name="file" class="form-control">
                    <button type="submit" class="btn btn-info mt-2">Import Products</button>
                </form>
            </div>
        </div>
        <table class="table table-striped w-100 mt-3">
            <thead>
                <tr>
                    <th scope="col" class="text-center">No</th>
                    <th scope="col" class="text-center">Nama</th>
                    <th scope="col" class="text-center">Stok</th>
                    <th scope="col" class="text-center">Berat</th>
                    <th scope="col" class="text-center">Harga</th>
                    <th scope="col" class="text-center">Kondisi</th>
                    <th scope="col" class="text-center" style="width: 150px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center">{{ $product->nama }}</td>
                        <td class="text-center">{{ $product->stok }}</td>
                        <td class="text-center">{{ $product->berat }}</td>
                        <td class="text-center">Rp. {{ number_format($product->harga, 0, ',', '.') }}</td>
                        @if ($product->kondisi == 'Baru')
                            <td class="text-center"><div
                                    class="rounded px-3 py-1 bg-success w-50 mx-auto">{{ $product->kondisi }}</div></td>
                        @else
                            <td class="text-center"><div
                                    class="rounded px-3 py-1 bg-dark text-white w-50 mx-auto">{{ $product->kondisi }}</div></td>
                        @endif
                        <td class="d-flex">
                            
                                <!-- Tombol untuk mengedit produk -->
                                <a href="{{ route('products.edit', ['product' => $product->id]) }}" class="btn btn-warning btn-sm">Edit</a>
                                
                                <!-- Form untuk menghapus produk -->
                                <form action="{{ route('products.destroy', ['product' => $product->id]) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                                </form>
                            </td>
                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
@endsection
