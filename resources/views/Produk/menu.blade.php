

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
    <div class="mx-lg-5 mt-lg-4 mb-lg-3">
        <div class="rounded bg-info pt-3 pb-3">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col">
                        <div class="col-auto text-start"> 
                            <a href="{{ route('Produk.tambah') }}">
                                <button type="button" class="btn btn-dark">Tambah</button>
                            </a>
                            <a href="{{ route('Produk.index') }}">
                                <button type="button" class="btn btn-dark">Kembali Ke Produk</button>
                            </a>
                        </div>
                        <h2 class="text-center fw-bold mt-2">LIST PRODUCTS</h2>
                    </div>
                </div>
            </div>
            <div class="mt-3 bg-dark mx-auto rounded" style="height: 3px;width: 75px"></div>
            <div class="grid mx-3 mt-4">
                <table class="table table-sm">
                    <thead>
                      <th>#</th>
                      <th>Nama</th>
                      <th>Stok</th>
                      <th>Berat</th>
                      <th>Harga</th>
                      <th>Kondisi</th>
                      <th>Action</th>
                    </thead>
                    <tbody>
                        @php $num=1; @endphp
                        @foreach ($producs as $item)
                        <tr>
                            <td>{{$num++}}</td>
                            <td>{{$item->Nama}}</td>
                            <td>{{$item->Stok}}</td>
                            <td>{{$item->Berat}}</td>
                            <td>{{$item->Harga}}</td>
                            <td>{{$item->Kondisi}}</td>
                            <td>
                                <a href="{{ route('Produk.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('Produk.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                                </form>
                
                            </td>
                        </tr>
                        @endforeach

                      
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

</html>
