<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  </head>
  <body>
    <div class="container">
      <div class="row w-100 my-lg-5 bg-info rounded">
          <div class="w-100 my-5">
    {{-- tabel --}}
    <div class="d-flex justify-content-between">
      <h1>List data product</h1>
     <div>
     <a class="btn btn-success" href="/">show product</a>
     <a class="btn btn-dark" href="/tambah">new product</a>
     <a class="btn btn-primary" href="/detailuser/{user_id}">Show Profile</a>

     </div>
    </div>
    <div>
        <table class="table mt-3 ">
            <thead>
                <tr class="table-dark">
                    <th scope="col ">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Berat</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Kondisi</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Action </th>
                  </tr>
            </thead>
            <tbody>
              @foreach ($product as $item)
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $item["nama"] }}</td>
                <td>{{ $item["harga"] }}</td>
                <td>{{ $item["stok"] }}</td>
                <td>{{ $item["berat"] }}</td>
                <td>{{ $item["kondisi"] }}</td>
                <td>{{ $item["deskripsi"] }}</td>
                 <td>
                     <img  style="width: 150px;" src={{ $item["gambar"] }} alt="Image"></td>
                 <td>
                  <div>
                    <form method="POST" class="d-inline" action="{{ route('EditProduct.destroy', $item->id) }}">
                      @method('delete')
                      @csrf
                      <button type="submit" onclick="return confirm('are you sure ?')" data-toggle="tooltip" title="delete" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                  </form>
                  
                    <a style="color: white" class="btn btn-warning ml-2" href="/EditProduct/{{ $item['id'] }}/edit"><i class="bi bi-pencil-square"></i></a>
                  </div>
                 </td>
              </tr>
              @endforeach
             
            </tbody>
        </table>
    </div>
    {{-- akhir tabel --}}
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>