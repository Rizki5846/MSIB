<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    
    <div class="container mt-5">
      <div class="row">
          <div class="col-6 border border-3 border-black p-2">
              @if($user) 
                  <p>Nama : {{ $user->name }}</p>
                  <p>email:  {{ $user->email }}</p>
                  <p>tanggal lahir  :  {{ $user->tanggal_lahir }}</p>
                  <p>gender :  {{ $user->gender }}</p>
                  <p>umur :  {{ $user->umur}}</p>
              @else
                  <p>User tidak ditemukan.</p>
              @endif
          </div>
          <div class="col-6 border border-3 border-black p-2">
              
              @if($toko)
                  <p>Nama toko : {{ $toko->nama }}</p>
                  <p>alamat:  {{ $toko->alamat }}</p>
                  <p>telpon :  {{ $toko->telpon }}</p>
                  <p>produk terbaik :  {{ $toko->product_terbaik }}</p>
                  <p>deskripsi:  {{ $toko->deskripsi}}</p>
              @else
                  <p>Toko tidak ditemukan.</p>
              @endif
          </div>
      </div>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>