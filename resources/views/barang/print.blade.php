<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
    <img src="{{ asset('/') }}dist/img/logosmk.png" alt="">
    <h5 style="text-align: center">LAPORAN BARANG</h5>
    <p>Dibuat :</p>
    <div>
        <table class="table table-bordered">
            <thead>
        <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Qty Barang</th>
            <th>Satuan Barang</th>
        </tr>
    </thead>
<tbody>
        @php
            $i=1;
        @endphp
        @foreach ( $barang as $items=>$item )
        <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $item->kode_barang }}</td>                    
            <td>{{ $item->nama_barang }}</td>                    
            <td>{{ $item->qty }}</td>                    
            <td>{{ $item->satuan }}</td>                    
        </tr>
        @endforeach
    </tbody>

    </table>
    </div>
</body>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</html>