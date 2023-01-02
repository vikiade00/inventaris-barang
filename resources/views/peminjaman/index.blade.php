@extends('layout.tamplate')
@section('title')
Form Transaksi Peminjaman
@endsection
@section('content')
<input class="" type="text" placeholder="Cari Data...">

<a href="/peminjaman/create" type="button" class="btn btn-primary btn-sm">Tambah Data <span data-feather="file-plus"></span></a>
    <table id="t_barang" class="table table-hover mt-3 me-3 ms-3 text-gray-800">
        <thead>
            <tr>
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
            <tr>
                <td>1</td>                    
                <td>Viki Ade Safaat</td>                    
                <td>Kabel VGA</td>                    
                <td>1</td>                    
                <td>Pcs</td>                    
                <td>11-12-22</td>                    
                <td>-</td>                    
                <td>Presentasi</td>                    
                <td>
                    <span class="bg-warning border-0 badge">Di Pinjam</span>    
                </td>                    
                <td>
                    <a href="#" class="badge bg-warning border-0"><span data-feather="edit"></a>
                    <form action="" method="post" class="d-inline">
                    <button class="badge bg-danger border-0" onclick="return confirm('Apakah anda yakin akan mengahpus data ?')"><span data-feather="x-circle"></span></button>
                    </form>
                  </td>
            </tr>
        </tbody>
      </table><br>
@endsection