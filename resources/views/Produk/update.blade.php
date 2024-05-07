<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <section class="container">
      <div class="row">
        <div class="col-6 m-auto my-5 border border-success p-3">
          <h2 class="text-center fw-bold mb-4">Tambah data produk</h2>
          <form method="POST" action="/EditProduct/{{ $product->id }}">
            @method('PUT')
            @csrf
                  @if ($errors->has('error'))
          <div class="alert alert-danger">
              {{ $errors->first('error') }}
          </div>
      @endif
            {{-- gambar --}}
            <div class="mb-3">
              <label for="gambar_produk" class="form-label fw-bold">Gambar Produk</label>
              <input value={{$product->gambar }} name="gambar" type="text" class="form-control" id="gambar_produk">
            </div>
            {{-- nama produk --}}
            <div class="mb-3">
              <label for="nama_produk" class="form-label fw-bold">Nama Produk</label>
              <input value={{$product->nama }} name="nama" type="text" class="form-control" id="nama_produk">
            </div>
            {{-- berat --}}
            <div class="mb-3">
              <label for="berat_produk" class="form-label fw-bold">berat</label>
              <input value={{$product->berat}} name="berat" type="number" class="form-control" id="berat_produk">
            </div>
            {{-- harga --}}
            <div class="mb-3">
              <label for="harga" class="form-label fw-bold">Harga</label>
              <input  value={{$product->harga }} name="harga" type="number" class="form-control" id="harga_produk">
            </div>
            {{-- stok --}}
            <div class="mb-3">
              <label for="stok" class="form-label fw-bold">Stok</label>
              <input value={{$product->stok }} name="stok" type="number" class="form-control" id="stok">
            </div>
            <select name="kondisi" class="form-select">
                <option value="baru" {{ $product['kondisi'] == 'baru' ? 'selected' : '' }}>Baru</option>
                <option value="second" {{ $product['kondisi'] == 'second' ? 'selected' : '' }}>Second</option>
            </select>
            
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label fw-bold">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $product->deskripsi }}</textarea>
            </div>
            

            {{-- submit --}}
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>