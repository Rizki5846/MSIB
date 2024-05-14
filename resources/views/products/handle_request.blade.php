<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
                <h2 class="text-center fw-bold" style="font-size: 20px">Tambah Data Produk</h2>
                <form id="produkForm" class="mt-3" action="{{ route('postRequest', ['user' => $user->id]) }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-1">
                        <label for="cover" class="form-label">Gambar</label>
                        <input type="file" class="form-control" id="gambar" name="gambar">
                        @error('gambar')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-1">
                        <label for="exampleFormControlInput1" class="form-label fw-semibold">Nama Produk</label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan nama produk" value="{{ old('nama') }}">
                        @error('nama')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-1">
                        <label for="exampleFormControlInput1" class="form-label fw-semibold">Berat</label>
                        <input type="number" class="form-control" name="berat" id="berat"
                            placeholder="Masukkan berat produk" value="{{ old('berat') }}">
                        @error('berat')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-1">
                        <label for="exampleFormControlInput1" class="form-label fw-semibold">Harga</label>
                        <input type="number" class="form-control" name="harga" id="harga"
                            placeholder="Masukkan harga produk" value="{{ old('harga') }}">
                        @error('harga')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-1">
                        <label for="exampleFormControlInput1" class="form-label fw-semibold">Stok</label>
                        <input type="number" class="form-control" name="stok" id="stok"
                            placeholder="Masukkan stok produk" value="{{ old('stok') }}">
                        @error('stok')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-1">
                        <label for="exampleFormControlInput1" class="form-label fw-semibold">Kondisi</label>
                        <select class="form-select form-control" aria-label="Default select example" name="kondisi"
                            id="kondisi">
                            <option selected value="0">Pilih Kondisi Barang</option>
                            <option value="Bekas" @if(old('kondisi') == 'Bekas') selected @endif>Bekas</option>
                            <option value="Baru" @if(old('kondisi') == 'Baru') selected @endif>Baru</option>
                        </select>
                        @error('kondisi')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label fw-semibold">Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3"
                            placeholder="Tuliskan deskripsi produk yang akan dijual">{{ old('deskripsi') }}</textarea>
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
    integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+YE3pd5ce+/62
    crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            $('#submitBtn').click(function (e) {
                e.preventDefault();
    
                var gambar = $('#gambar').val();
                var nama = $('#nama').val();
                var berat = $('#berat').val();
                var harga = $('#harga').val();
                var stok = $('#stok').val();
                var kondisi = $('#kondisi').val();
                var deskripsi = $('#deskripsi').val();
    
                // Validasi input
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
                    $('#produkForm').submit();
                }
            });
        });
    </script>
    </html>
    
