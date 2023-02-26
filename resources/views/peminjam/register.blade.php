<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="{{ asset('/') }}dist/img/logosmk.png">

    <title>SIMBA | Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  
</head>
  <body style="background-color: hsl(0, 0%, 96%)">
    <!-- Section: Design Block -->
<section class="">
  <!-- Jumbotron -->
  <div class="mt-5 px-4 py-5 px-md-5 text-center text-lg-start">
    <div class="container">
      <div class="row gx-lg-5 align-items-center">
        <div class="col-lg-6 mb-5 mb-lg-0">
          <center><img src="/img/logosmk.png" alt="logo-smk" width="130"></center>
          <h1 class="my-3 display-4 fw-bold ls-tight">
            SISTEM INVENTARIS BARANG | SIMBA <br />
            <span class="text-primary">SMK PASUNDAN 2 BANDUNG</span>
          </h1>
          <p style="color: hsl(217, 10%, 50.8%)">
            Pastikan data sudah benar sebelum data dikirimkan.
            Jika terjadi kesalahan mohon hubungi Admin !
          </p>
        </div>

        <div class="col-lg-6 mb-5 mb-lg-0">
          <div class="card">
            <div class="card-body py-5 px-md-5">
              <form action="/peminjam/store" method="POST">
                @csrf
                <!-- 2 column grid layout with text inputs for the first and last names -->
                <div class="row mb-1">
                  <h3 class="text-primary"><strong>Daftar Data Peminjaman Barang</strong></h3>  
                </div>
              <p class="mb-4"><strong>Pastikan data yang anda masukan benar, Kesalahan data bisa mempengaruhi proses peminjaman !</strong></p>
              
                <!-- Email input -->
                <div class="form-outline mb-2">
                  <label class="form-label" for="email">E-mail :</label>
                  <input maxlength="50" autocomplete="off" placeholder="Masukan E-mail" type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" autofocus value="{{ old('email') }}"/>
                  @error('email')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
                </div>
              
                <!-- nama input -->
                <div class="form-outline mb-2">
                  <label class="form-label" for="nama">Nama Lengkap :</label>
                  <input maxlength="50" onkeyup="this.value = this.value.toUpperCase()" autocomplete="off" placeholder="Masukan Nama Lengkap" type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" autofocus value="{{ old('nama') }}"/>
                  @error('nama')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
                </div>
              
                <!-- no-wa input -->
                <div class="form-outline mb-2">
                  <label class="form-label" for="no_wa">No Whatshap (aktif) :</label>
                  <input onkeyup="this.value = this.value.toUpperCase()" autocomplete="off" placeholder="Masukan No Whatshap" type="number" name="no_wa" id="no_wa" class="form-control @error('no_wa') is-invalid @enderror" autofocus value="{{ old('no_wa') }}" />
                  @error('no_wa')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
                </div>

                <div class="form-outline mb-2">
                  <label class="form-label" for="kelas">Kelas :</label>
                  <input maxlength="10" onkeyup="this.value = this.value.toUpperCase()" autocomplete="off" placeholder="Masukan Kelas" type="text" name="kelas" id="kelas" class="form-control @error('kelas') is-invalid @enderror" autofocus value="{{ old('kelas') }}" />
                  @error('kelas')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
                </div>
              
                <div class="form-outline mb-4">
                  <label class="form-label" for="alamat">Alamat :</label>
                  <input maxlength="120" onkeyup="this.value = this.value.toUpperCase()" autocomplete="off" placeholder="Masukan No Alamat" type="text" name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror" autofocus value="{{ old('alamat') }}" />
                  @error('alamat')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
                </div>
                
                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4">
                  Daftar
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