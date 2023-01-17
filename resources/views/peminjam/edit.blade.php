@extends('layout.tamplate')
@section('title')
Form Tambah Data Barang
@endsection
@section('content')
  <form action="/peminjam/{{ $peminjam->id }}" method="post" enctype="multipart/form-data">
    @method('PUT')
      @csrf
      <div class="mb-3">
        <label for="email" class="col-form-label">Email :</label>
        <input autocomplete="off" type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" autofocus value="{{ old('email',$peminjam->email) }}">
        @error('email')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="nama" class="col-form-label">Nama :</label>
        <input autocomplete="off" onkeyup="this.value = this.value.toUpperCase()" type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" autofocus value="{{ old('nama',$peminjam->nama) }}">
        @error('nama')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="no_wa" class="col-form-label">No Whatshap :</label>
        <input autocomplete="off" onkeyup="this.value = this.value.toUpperCase()" type="text" class="form-control @error('no_wa') is-invalid @enderror" id="no_wa" name="no_wa" autofocus value="{{ old('no_wa',$peminjam->no_wa) }}">
        @error('no_wa')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="alamat" class="col-form-label">Alamat :</label>
        <input autocomplete="off" onkeyup="this.value = this.value.toUpperCase()" type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" autofocus value="{{ old('alamat',$peminjam->alamat) }}">
        @error('alamat')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="modal-footer">
        <a href="/peminjam" type="button" class="btn btn-secondary">Close</a>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </form>
@endsection


