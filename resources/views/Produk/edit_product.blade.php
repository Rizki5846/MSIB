<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data Produk {{ $product->id }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        @if (Session::has('error'))
            <div class="row">
                <div class="col-md-4 offset-4 mt-2 py-2 rounded bg-danger text-white fw-bold">
                    {{ Session::get('error') }}
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-md-4 offset-4 rounded bg-info mt-3 py-3">
                <h2 class="text-center fw-bold" style="font-size: 20px">Edit Data Produk {{ $product->id }}</h2>
                <form id="editProdukForm" class="mt-3" action="{{ route('update_product', ['product' => $product->id, 'user' => $user->id]) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="mb-1">
                        <label for="exampleFormControlInput1" class="form-label fw-semibold">Gambar Produk</label>
                        <input type="file" class="form-control" name="gambar">
                        <!-- Tambahkan pesan kesalahan untuk gambar jika diperlukan -->
                        @error('gambar')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-1">
                        <label for="exampleFormControlInput1" class="form-label fw-semibold">Nama Produk</label>
                        <input type="text" class="form-control" name="nama"
                            placeholder="Masukkan nama produk" value="{{ $product->nama }}">
                        <!-- Tambahkan pesan kesalahan untuk nama jika diperlukan -->
                        @error('nama')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-1">
                        <label for="exampleFormControlInput1" class="form-label fw-semibold">Berat</label>
                        <input type="number" class="form-control" name="berat"
                            placeholder="Masukkan berat produk" value="{{ $product->berat }}">
                        <!-- Tambahkan pesan kesalahan untuk berat jika diperlukan -->
                        @error('berat')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-1">
                        <label for="exampleFormControlInput1" class="form-label fw-semibold">Harga</label>
                        <input type="number" class="form-control" name="harga"
                            placeholder="Masukkan harga produk" value="{{ $product->harga }}">
                        <!-- Tambahkan pesan kesalahan untuk harga jika diperlukan -->
                        @error('harga')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-1">
                        <label for="exampleFormControlInput1" class="form-label fw-semibold">Stok</label>
                        <input type="number" class="form-control" name="stok"
                            placeholder="Masukkan stok produk" value="{{ $product->stok }}">
                        <!-- Tambahkan pesan kesalahan untuk stok jika diperlukan -->
                        @error('stok')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-1">
                        <label for="exampleFormControlInput1" class="form-label fw-semibold">Kondisi</label>
                        <select class="form-select form-control" aria-label="Default select example" name="kondisi">
                            <option value="Bekas" {{ $product->kondisi == 'Bekas' ? 'Selected' : '' }}>Bekas</option>
                            <option value="Baru" {{ $product->kondisi == 'Baru' ? 'Selected' : '' }}>Baru</option>
                        </select>
                        <!-- Tambahkan pesan kesalahan untuk kondisi jika diperlukan -->
                        @error('kondisi')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label fw-semibold">Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" id="exampleFormControlTextarea1" rows="3"
                            placeholder="Tuliskan deskripsi produk yang akan dijual">{{ $product->deskripsi }}</textarea>
                        <!-- Tambahkan pesan kesalahan untuk deskripsi jika diperlukan -->
                        @error('deskripsi')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="d-flex">
                        <button class="btn btn-dark mx-auto" type="submit" id="submitBtn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+YE3pd5ce+/62nUZ6kl9GD9Av2Hpt29z+3vvlHJ"
    crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        $('#submitBtn').click(function (e) {
            e.preventDefault();

            var gambar = $('input[name="gambar"]').val();
            var nama = $('input[name="nama"]').val();
            var berat = $('input[name="berat"]').val();
            var harga = $('input[name="harga"]').val();
            var stok = $('input[name="stok"]').val();
            var kondisi = $('select[name="kondisi"]').val();
            var deskripsi = $('textarea[name="deskripsi"]').val();

            // Validasi input di sini
            var error = false;

            if (gambar.trim() === '') {
                $('#gambarError').text('Gambar produk harus diisi');
                error = true;
            } else {
                $('#gambarError').text('');
            }

            if (nama.trim() === '') {
                $('#namaError').text('Nama produk harus diisi');
                error = true;
            } else {
                $('#namaError').text('');
            }

            if (berat.trim() === '') {
                $('#beratError').text('Berat produk harus diisi');
                error = true;
            } else {
                $('#beratError').text('');
            }

            if (harga.trim() === '') {
                $('#hargaError').text('Harga produk harus diisi');
                error = true;
            } else {
                $('#hargaError').text('');
            }

            if (stok.trim() === '') {
                $('#stokError').text('Stok produk harus diisi');
                error = true;
            } else {
                $('#stokError').text('');
            }

            if (kondisi === '0') {
                $('#kondisiError').text('Kondisi produk harus dipilih');
                error = true;
            } else {
                $('#kondisiError').text('');
            }

            if (deskripsi.trim() === '') {
                $('#deskripsiError').text('Deskripsi produk harus diisi');
                error = true;
            } else {
                $('#deskripsiError').text('');
            }

            // Kirim formulir jika tidak ada kesalahan
            if (!error) {
                $('#editProdukForm').submit();
            }
        });
    });
</script>

</html>
