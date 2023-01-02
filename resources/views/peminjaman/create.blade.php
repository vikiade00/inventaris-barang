@extends('layout.tamplate')
@section('title')
Form Transaksi Peminjaman

@endsection
@section('content')
  <form action="/peminjaman" method="post">
      @csrf
      <div class="mb-3">
        <label for="nama_barang" class="col-form-label">Nama Peminjam:</label>
        <input type="text" onkeyup="autofill()" class="form-control @error('nama_barang') is-invalid @enderror" id="nama_barang" name="nama_barang" autofocus value="{{ old('nama_barang') }}">
        @error('nama_barang')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="nama_barang" class="col-form-label">Nama Barang:</label>
        
        <select class="form-control" name="nama_barang" id="nama_barang" >
            @foreach ($data as $item)       
            <option value="{{ $item->id }}">{{ $item->nama_barang }}</option>
            @endforeach
        </select>
      </div>
      <div class="mb-3">
        <label for="qty" class="col-form-label">Stok Tersedia:</label>
        <input type="number" class="form-control" name="qty" id="qty" value="" readonly>
      </div>
        <div class="mb-3">
        <label for="jumlah_pinjam" class="col-form-label">Jumlah Pinjam:</label>
        <input type="number" class="form-control @error('jumlah_pinjam') is-invalid @enderror" name="jumlah_pinjam" autofocus value="{{ old('jumlah_pinjam') }}">
        @error('jumlah_pinjam')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
      </div>
      <div class="mb-3">
        <label for="satuan" class="col-form-label">Satuan Barang:</label>
        <input type="text" class="form-control" id="satuan" name="satuan" value="" re>
      </div>
      <div class="mb-3">
        <label for="tgl_pinjam" class="col-form-label">Tgl Peminjaman:</label>
        <input type="date" class="form-control @error('tgl_pinjam') is-invalid @enderror" name="tgl_pinjam" autofocus value="{{ old('tgl_pinjam') }}">
        @error('tgl_pinjam')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
      </div>
      <div class="mb-3">
        <label for="keperluan" class="col-form-label">keperluan :</label>
        <input type="text" class="form-control @error('keperluan') is-invalid @enderror" name="keperluan" autofocus value="{{ old('keperluan') }}">
        @error('keperluan')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
      </div>
      <div class="modal-footer">
        <a href="/barang" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </form>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
    function autofill(){
      var nama_barang = $("#nama_barang").val();
      $.ajax({
        url : "autofill",
        data : 'nama_barang='+nama_barang,
      }).success(function(data){
        alert('sukses');
      });
    }
    </script>
@endsection


