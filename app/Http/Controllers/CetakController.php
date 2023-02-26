<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use PDF;
class CetakController extends Controller
{
    function cetakBarang(){
        $barang = Barang::all();
 
    	$pdf = PDF::loadview('barang.print',['barang'=>$barang]);
    	return $pdf->Stream('laporan-barang-pdf');
    }
}
