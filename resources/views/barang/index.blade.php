@extends('layout.tamplate')
@section('title')
Form Data Barang
@endsection
@section('content')
<input class="  " type="text" placeholder="Cari Data...">

<a href="/barang/create/" type="button" class="btn btn-primary btn-sm">Tambah Data <span data-feather="file-plus"></span></a>
    <table id="t_barang" class="table table-hover mt-3 me-3 ms-3 text-gray-800">
        <thead>
            <tr>
              <th scope="col">NO</th>
              <th scope="col">KODE BARANG</th>
              <th scope="col">NAMA BARANG</th>
              <th scope="col">QTY</th>
              <th scope="col">SATUAN</th>
              <th scope="col">UPDATE</th>
              <th scope="col">AKSI</th>
            </tr>
          </thead>
          <tbody>
            <tr>
                @foreach ($data as $items => $item)
                @csrf
                <th>{{ $items + $data->firstItem() }}</th>
                <td>{{ $item->kode_barang }}</td>                    
                <td>{{ $item->nama_barang }}</td>                    
                <td>{{ $item->qty }}</td>                    
                <td>{{ $item->satuan }}</td>                    
                <td>{{ $item->updated_at }}</td>                    
                <td>
                    <a href="barang/{{ $item->id }}/edit" class="badge bg-warning border-0"><span data-feather="edit"></a>
                    <form action="{{ route('barang.destroy',$item->id) }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="badge bg-danger border-0" onclick="return confirm('Apakah anda yakin akan mengahpus data ?')"><span data-feather="x-circle"></span></button>
                    </form>
                  </td>
            </tr>
            @endforeach
        </tbody>
      </table><br>
      {{ $data->links('pagination::bootstrap-5') }}
@endsection