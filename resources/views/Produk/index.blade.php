<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <div class="row w-100 my-lg-5 bg-info rounded">
          <div class="w-100 my-5">
    <h1 class="text-center mt-3">List Produk</h1>
    <div class="container bg-dange d-flex justify-content-between">
      <a class="btn btn-primary" href="/listProduct/1">admin</a>
      <a class="btn btn-success" href="/listProduct/2">Marchendast</a>
    </div>
    <section class=" container d-flex flex-wrap flex-grow-1 p-5 m-auto">
        {{-- card 1 --}}
        @foreach ($product as $item)
        <div class="card m-2" style="width: 18rem;">
            <img height="200px" src={{ $item['gambar'] }} class="card-img-top" alt="coba">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-2">
                    <h5 class="card-title">{{ $item['nama'] }}</h5>
                    <button type="button" class="btn btn-success">{{ $item['kondisi'] }}</button>
                </div>
                <div class="d-flex justify-content-between">
                    <button type="button" class="btn btn-success">{{ $item['stok'] }}</button>
                    <button type="button" class="btn btn-success">{{ $item['harga'] }}</button>
                </div>
              <p class="card-text p-2">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        @endforeach
       
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>