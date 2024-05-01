<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">Tambah Produk</div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('Produk.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="Nama" class="form-label">Nama Produk:</label>
                                <input type="text" class="form-control" id="Nama" name="Nama" required>
                            </div>
                            <div class="mb-3">
                                <label for="Harga" class="form-label">Harga:</label>
                                <input type="number" class="form-control" id="Harga" name="Harga" required>
                            </div>

                            <div class="mb-3">
                                <label for="Stok" class="form-label">Stok:</label>
                                <input type="number" class="form-control" id="Stok" name="Stok" required>
                            </div>

                            <div class="mb-3">
                                <label for="Berat" class="form-label">Berat:</label>
                                <input type="number" step="0.01" class="form-control" id="Berat" name="Berat" required>
                            </div>

                            <div class="mb-3">
                                <label for="Kondisi" class="form-label">Kondisi:</label>
                                <select class="form-control" id="Kondisi" name="Kondisi" required>
                                    <option value="Baru">Baru</option>
                                    <option value="Bekas">Bekas</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="Deskripsi" class="form-label">Deskripsi:</label>
                                <textarea class="form-control" id="Deskripsi" name="Deskripsi" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="Gambar" class="form-label">Gambar:</label>
                                <input type="file" class="form-control-file" id="Gambar" name="Gambar">
                            </div>

                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
