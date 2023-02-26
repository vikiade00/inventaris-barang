@extends('layout.tamplate')
@section('title')
Form Data Barang
@endsection
@section('titleform')
Data Barang
@endsection
@section('content')
@can('admin')    
<a href="/barang/create" type="button" class="btn btn-primary btn-sm mb-4">Tambah Data <span data-feather="file-plus"></span></a>
@endcan
<a href="/print/barang" target="_blank" type="button" class="btn btn-primary btn-sm mb-4">Print Data <span data-feather="file-plus"></span></a>
    <div class="table-responsive">
<table id="datatables" class="table table-hover mt-3 me-3 text-gray-800">
        <thead>
            <tr class="bg-primary">
              <th scope="col">NO</th>
              <th scope="col">KODE BARANG</th>
              <th scope="col">NAMA BARANG</th>
              <th scope="col">QTY</th>
              <th scope="col">SATUAN</th>
              <th scope="col">UPDATE</th>
              @can('admin')                  
              <th scope="col">AKSI</th>
              @endcan
            </tr>
          </thead>
          <tbody>
            @if ($data->count()>0)                  
            @foreach ($data as $items => $item)
            @csrf
            <tr>
                <input type="hidden" class="delete_id" value="{{ $item->id }}">
                <th>{{ $items + $data->firstItem() }}</th>
                <td>{{ $item->kode_barang }}</td>                    
                <td>{{ $item->nama_barang }}</td>                    
                <td>{{ $item->qty }}</td>                    
                <td>{{ $item->satuan }}</td>                    
                <td>{{ $item->updated_at }}</td>                    
                @can('admin')                    
                <td>
                    <a href="barang/{{ $item->id }}/edit" class="badge bg-primary border-0"><span data-feather="edit-3"></a>
                    <form action="{{ route('barang.destroy',$item->id) }}" method="post" class="d-inline">
                      @csrf
                      @method('delete')
                    <button class="badge bg-danger border-0 btndelete"><span data-feather="x-circle"></span></button>
                    </form>
                  </td>
                @endcan
            </tr>
            @endforeach  
                      
        </tbody>
        @endif

      </table>
    </div>
      
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
                                  url: 'barang/' + deleteid,
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
@endsection