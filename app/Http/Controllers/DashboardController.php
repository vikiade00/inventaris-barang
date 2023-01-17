<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Peminjam;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use App\Models\User;
use App\Models\users;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index(){
        $barang = Barang::all();
        $peminjaman = Peminjaman::all();
        $pengembalian = Pengembalian::all();
        $peminjam = Peminjam::all();
        return view('dashboard.index', compact('barang','peminjaman','pengembalian','peminjam'));
    }
}
