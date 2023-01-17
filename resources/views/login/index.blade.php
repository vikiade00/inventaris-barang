<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="{{ asset('/') }}dist/img/logosmk.png">

    <title>SIMBA | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  
</head>
  <body style="background-color: hsl(0, 0%, 96%)">
@include('sweetalert::alert')

    <!-- Section: Design Block -->
<section class="">
  <!-- Jumbotron -->
  <div class="mt-5 px-4 py-5 px-md-5 text-center text-lg-start">
    <div class="container">
      <div class="row gx-lg-5 align-items-center">
        <div class="col-lg-6 mb-5 mb-lg-0">
          <center><img src="img/logosmk.png" alt="logo-smk" width="130"></center>
          <h1 class="my-3 display-4 fw-bold ls-tight">
            SISTEM INVENTARIS BARANG | SIMBA <br />
            <span class="text-primary">SMK PASUNDAN 2 BANDUNG</span>
          </h1>
          <p style="color: hsl(217, 10%, 50.8%)">
            SIMBA (SISTEM INVENTARIS BARANG) Merupakan sebuah
            aplkasi pengelolaan peminjaman inventaris barang yang ada
            di SMK PASUNDAN 2 Bandung, guna untuk mempermudah pengelolaan
            peminjaman barang.
          </p>
        </div>

        <div class="col-lg-6 mb-5 mb-lg-0">
          <div class="card">
            <div class="card-body py-5 px-md-5">
              <form action="/sesi/login" method="POST">
                @csrf
                <!-- 2 column grid layout with text inputs for the first and last names -->
                <div class="row mb-3">
                  <h3 class="text-primary"><strong>Admin Area</strong></h3>  
                </div>

                <!-- Email input -->
                <div class="form-outline mb-4">
                  <label class="form-label" for="username">Username</label>
                  <input autocomplete="off" placeholder="Masukan Username" type="text" name="username" id="username" class="form-control" />
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                  <label class="form-label" for="password">Password</label>
                  <input autocomplete="off" placeholder="Masukan Password" type="password" name="password" id="password" class="form-control" />
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4">
                  Sign up
                </button>
<br>
                Kamu mau pinjam barang ? <a href="/peminjam/register"> Daftar </a> akun peminjam dulu yuk !
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Jumbotron -->
</section>
<!-- Section: Design Block -->  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>
