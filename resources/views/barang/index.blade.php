@extends('layout.tamplate')
@section('title')
Form Data Barang
@endsection
@section('content')
<h2>Form Data Barang</h2>
    <a href="/barang/create" type="button" class="btn btn-primary btn-sm">+Tambah</a>
    <table class="table table-hover mt-3 me-3 ms-3 text-gray-800">
        <thead>
            <tr>
              <th scope="col">NO</th>
              <th scope="col">KODE BARANG</th>
              <th scope="col">NAMA BARANG</th>
              <th scope="col">QTY</th>
              <th scope="col">SATUAN</th>
              <th scope="col">GAMBAR</th>
              <th scope="col">UPDATE</th>
              <th scope="col">AKSI</th>
            </tr>
          </thead>
          <tbody>
            <tr>
                @foreach ($data as $item )
                @csrf
                <td>1</td>
                <td>{{ $item->kode_barang }}</td>                    
                <td>{{ $item->nama_barang }}</td>                    
                <td>{{ $item->qty }}</td>                    
                <td>{{ $item->satuan }}</td>                    
                <td>{{ $item->gambar }}</td>                    
                <td>{{ $item->updated_at }}</td>                    
                <td>
                    <a href="barang/edit" class="btn btn-warning btn-sm">Update</button>
                    <button class="btn btn-danger btn-sm">Del</button>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
@endsection