<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Reservasi Rumah Sakit</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg bg-light">
      <div class="container-md">
        <a class="navbar-brand text-dark fw-bold" href="#">Amandemy</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div
          class="collapse navbar-collapse justify-content-end"
          id="navbarNav"
        >
          <ul class="navbar-nav">
           
           
            <li class="nav-item me-5">
              <a class="nav-link text-dark " href="{{route('products.index')}}">Product</a>
            </li>
            <a href="{{route('login')}}">
                <button type="button" class="btn btn-primary px-4 border-light ">
                    Login
                </button>
            </a>
          </ul>
        </div>
      </div>
    </nav>
    <!-- navbar end -->

    <!-- hero section -->
    <section class="hero-section py-5">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6">
            <h1>Lorem ipsum dolor sit.</h1>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum nobis veniam 
              molestiae omnis pariatur. Excepturi beatae sint, repellat omnis,
            vero harum odit tenetur totam veritatis consequuntur libero veniam illo commodi!
            </p>
            <a href="{{route('products.index')}}">
                <button class="btn btn-primary">BuyNow</button>
            </a>
            </div>
          <div class="col-lg-6">
            <img
              class="img-fluid"
              src="https://via.placeholder.com/400x400"
              alt="Hero Image"
            />
          </div>
        </div>
      </div>
    </section>
    <!-- hero section end -->
    <!-- cdn js -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>