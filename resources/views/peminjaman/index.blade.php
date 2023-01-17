@extends('layout.tamplate')
@section('title')
Form Transaksi Peminjaman
@endsection
@section('titleform')
  Form Peminjaman Barang
@endsection
@section('content')
<div class="table-responsive">
  <div class="row">
    <div class="col">
    <a href="/peminjaman/create" type="button" class="btn btn-primary btn-sm mb-3">Tambah Data <span data-feather="file-plus"></span></a>
    </div>
    <div class="col-2">
    <p class="text-primary"><h5>WAKTU : <b><span id="jam" style="font-size:24"></span></h5></b></p>
    </div>
  </div>
<table id="datatables" class="table table-hover table-responsive-fluid mt-3 me-3 text-gray-800">
        <thead>
            <tr class="bg-primary">
              <th scope="col">NO</th>
              <th scope="col">NAMA PEMINJAM</th>
              <th scope="col">NAMA BARANG</th>
              <th scope="col">JUMLAH PINJAM</th>
              <th scope="col">SATUAN</th>
              <th scope="col">TGL PINJAM</th>
              <th scope="col">KEPERLUAN</th>
              <th scope="col">STATUS</th>
              <th scope="col">AKSI</th>
            </tr>
          </thead>
          <tbody>
            @if (count($data))                
            @foreach ($data as $items => $item)
            @csrf
            <tr>
                <input type="hidden" class="delete_id" value="{{ $item->id }}">
                <th>{{ $items + $data->firstItem() }}</th>                    
                <td>{{ $item->nama_peminjam }}</td>                    
                <td>{{ $item->barang->nama_barang }}</td>                    
                <td>{{ $item->jumlah_pinjam }}</td>                    
                <td>{{ $item->barang->satuan }}</td>                    
                <td>{{ $item->created_at }}</td>                    
                <td>{{ $item->keperluan }}</td>                    
                <td>
                    <span class="bg-warning border-0 badge">DI PINJAM</span>    
                </td>                    
                <td>
                  <a href="peminjaman/{{ $item->id }}/edit" class="badge bg-success border-0" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $item->id }}"><span data-feather="check-circle"></a>
                  </td>
            </tr>
            @endforeach
             
        </tbody>
        @endif

      </table><br>
    </div>  
{{-- update barang --}}      
@foreach ($data as $item)    
<div class="modal fade" id="exampleModal-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi <span data-feather="alert-circle"></span> </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/peminjaman/{{ $item->id }}" method="post">
          @method('put')
          @csrf
          Apakah anda yakin akan menyelesaikan peminjaman ?
          <input hidden type="text" class="form-control" id="id" name="id" value="{{ $item->id }}">  
          <input hidden type="text" class="form-control" id="id_barang" name="id_barang" value="{{ $item->barang->id }}">  
          <input hidden type="text" class="form-control" id="nama_peminjam" name="nama_peminjam" value="{{ $item->nama_peminjam }}">  
          <input hidden type="text" class="form-control" id="nama_barang" name="nama_barang" value="{{ $item->barang->nama_barang }}">  
          <input hidden type="text" class="form-control" id="jumlah_pinjam" name="jumlah_pinjam" value="{{ $item->jumlah_pinjam }}">  
          <input hidden type="text" class="form-control" id="satuan" name="satuan" value="{{ $item->barang->satuan }}">  
          <input hidden type="text" class="form-control" id="tgl_pinjam" name="tgl_pinjam" value="{{ $item->created_at }}">  
          <input hidden type="text" class="form-control" id="keperluan" name="keperluan" value="{{ $item->keperluan }}">  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Selesaikan</button>
      </div>
    </form>

    </div>
  </div>
</div>
@endforeach
@endsection

@section('content2')
<section class="content">
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Form Pengembalian Selesai</h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
        <i class="fas fa-minus"></i>
      </button>
    </div>
  </div>
  <div class="card-body">
    <div class="table-responsive">
    <table id="datatables2" class="table table-hover table-responsive-fluid mt-3 me-3 text-gray-800">
      <thead>
          <tr class="bg-success">
            <th scope="col">NO</th>
            <th scope="col">NAMA PEMINJAM</th>
            <th scope="col">NAMA BARANG</th>
            <th scope="col">JUMLAH PINJAM</th>
            <th scope="col">SATUAN</th>
            <th scope="col">TGL PINJAM</th>
            <th scope="col">TGL KEMBALI</th>
            <th scope="col">KEPERLUAN</th>
            <th scope="col">STATUS</th>
            <th scope="col">AKSI</th>
          </tr>
        </thead>

        <tbody>
          @if (count($datas))
          <?php $i = $datas->firstItem() ?>
          @foreach ($datas as $items => $item)
          <tr>
              <input type="hidden" class="delete_id" value="{{ $item->id }}">
              <th>{{ $i++ }}</th>                    
              <td>{{ $item->nama_peminjam }}</td>                    
              <td>{{ $item->nama_barang }}</td>                    
              <td>{{ $item->jumlah_pinjam }}</td>                    
              <td>{{ $item->satuan }}</td>                    
              <td>{{ $item->tgl_pinjam }}</td>                    
              <td>{{ $item->updated_at}} </td>                    
              <td>{{ $item->keperluan }}</td>                    
              <td>
                  <span class="bg-success border-0 badge">SELESAI</span>    
              </td>                    
              <td>
                  <form action="/pengembalian/{{ $item->id }}" method="post">
                    @method('delete')
                    @csrf
                  <button class="badge bg-danger border-0 btndelete"><span data-feather="x-circle"></span></button>
                  </form>
                </td>
          </tr>
          @endforeach 
      </tbody>
      @endif

    </table><br>
  </div>
  </div>
  <!-- /.card-body -->

  <!-- /.card-footer-->
</div>
<!-- /.card -->
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>

  <script>
          $(document).ready(function () {
              $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
      
              $('.btndelete').click(function (e) {
                  e.preventDefault();
                  var deleteid = $(this).closest("tr").find('.delete_id').val();      
                  swal({
                          title: "Apakah anda yakin akan menghapus data?",
                          text: "Setelah dihapus, data tidak dapat dipulihkan lagi!",
                          icon: "warning",
                          buttons: true,
                          dangerMode: true,
                      })
                      .then((willDelete) => {
                          if (willDelete) {
      
                              var data = {
                                  "_token": $('input[name=_token]').val(),
                                  'id': deleteid,
                              };
                              $.ajax({
                                  type: "DELETE",
                                  url: 'pengembalian/' + deleteid,
                                  data: data,
                                  success: function (response) {
                                      swal(response.status, {
                                              icon: "success",
                                          })
                                          .then((result) => {
                                              location.reload();
                                          });
                                  }
                              });
                          }
                      });
              });
          });
      </script>

<script type="text/javascript">
  window.onload = function() { jam(); }
 
  function jam() {
      var e = document.getElementById('jam'),
      d = new Date(), h, m, s;
      h = d.getHours();
      m = set(d.getMinutes());
      s = set(d.getSeconds());
 
      e.innerHTML = h +':'+ m +':'+ s;
 
      setTimeout('jam()', 1000);
  }
 
  function set(e) {
      e = e < 10 ? '0'+ e : e;
      return e;
  }
</script>


@endsection