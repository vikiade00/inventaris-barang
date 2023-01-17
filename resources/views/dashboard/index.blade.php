@extends('layout.tamplate')
@section('title')
 Dashboard
@endsection
@section('titleform')
    Dashboard
@endsection
@section('content')
<section class="content">
    <div class="container-fluid">
    
    <div class="row">
    <div class="col-lg-3 col-6">
    
    <div class="small-box bg-info">
    <div class="inner">
    <h3>{{ count($barang) }}</h3>
    <p>Barang Inventaris</p>
    </div>
    <div class="icon">
    <i class="ion ion-cube"></i>
    </div>
    <a href="/barang" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
    </div>
    
    <div class="col-lg-3 col-6">
    
    <div class="small-box bg-warning">
    <div class="inner">
    <h3>{{ count($peminjaman) }}</h3>
    <p>Peminjaman Barang</p>
    </div>
    <div class="icon">
    <i class="ion ion-clipboard"></i>
    </div>
    <a href="/peminjaman" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
    </div>
    
    <div class="col-lg-3 col-6">
    
    <div class="small-box bg-success">
    <div class="inner">
    <h3>{{ count($pengembalian) }}</h3>
    <p>Pengembalian barang</p>
    </div>
    <div class="icon">
    <i class="ion ion-checkmark"></i>
    </div>
    <a href="/peminjaman" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
    </div>
    
    <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
            <h3>{{ count($peminjam) }}</h3>
            <p>Data Peminjam</p>
            </div>
            <div class="icon">
            <i class="ion ion-person"></i>
            </div>
            <a href="/peminjam" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            </div>
    </div>
    
    </div>    
@endsection