@extends('layout.tamplate')
@section('title')
Form Data Barang
@endsection
@section('content')
<div class="col-lg-8">        
  <form action="/barang" method="post">
      @csrf
      <div class="mb-3">
        <label for="kode_barang" class="col-form-label">Kode Barang:</label>
        <input type="text" class="form-control @error('kode_barang') is-invalid @enderror" id="kode_barang" name="kode_barang" autofocus value="{{ old('kode_barang') }}">
        @error('kode_barang')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="nama_barang" class="col-form-label">Nama Barang:</label>
        <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" name="nama_barang" autofocus value="{{ old('nama_barang') }}">
        @error('nama_barang')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
      </div>
      <div class="mb-3">
        <label for="qty" class="col-form-label">Qty:</label>
        <input type="number" class="form-control @error('qty') is-invalid @enderror" name="qty" autofocus value="{{ old('qty') }}">
        @error('qty')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
      </div>
      <div class="mb-3">
        <label for="satuan" class="col-form-label">Satuan Barang:</label>
        <input type="text" class="form-control @error('satuan') is-invalid @enderror" name="satuan" autofocus value="{{ old('satuan') }}">
        @error('satuan')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
      </div>
      <div class="mb-3">
        <label for="gambar" class="col-form-label">Gambar Barang:</label>
        <input type="file" class="form-control" name="gambar">
      
      </div>
      <div class="modal-footer">
        <a href="/barang" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </form>
  </div>
@endsection

