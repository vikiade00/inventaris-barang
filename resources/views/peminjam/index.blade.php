@extends('layout.tamplate')
@section('title')
    Data Peminjam
@endsection
@section('titleform')
    Data Peminjam
@endsection
@section('content')

<div class="table-responsive">
<table id="datatables" class="table table-hover mt-3 me-3 text-gray-800">
    <thead>
        <tr class="bg-primary">
          <th scope="col">NO</th>
          <th scope="col">Email</th>
          <th scope="col">Nama</th>
          <th scope="col">No Whatshap</th>
          <th scope="col">Alamat</th>
          <th scope="col">Update</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @if ($peminjam->count()>0)                  
        @foreach ($peminjam as $items => $item)
        @csrf
        <tr>
            <input type="hidden" class="delete_id" value="{{ $item->id }}">
            <th>{{ $items + $peminjam->firstItem() }}</th>
            <td>{{ $item->email }}</td>                    
            <td>{{ $item->nama }}</td>                    
            <td>{{ $item->no_wa }}</td>                    
            <td>{{ $item->alamat }}</td>                    
            <td>{{ $item->updated_at }}</td>                    
            <td>
                <a href="peminjam/{{ $item->id }}/edit" class="badge bg-primary border-0"><span data-feather="edit-3"></a>
                <form action="{{ route('peminjam.destroy',$item->id) }}" method="post" class="d-inline">
                  @csrf
                  @method('delete')
                <button class="badge bg-danger border-0 btndelete"><span data-feather="x-circle"></span></button>
                </form>
              </td>
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