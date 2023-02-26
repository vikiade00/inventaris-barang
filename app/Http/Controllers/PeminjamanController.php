<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Peminjam;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use Error;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::all();
        $pengembalian = Pengembalian::all();
        $peminjaman = Peminjaman::all();
        $datas = Pengembalian::latest()->paginate();
        $data = Peminjaman::latest()->paginate();
        return view('peminjaman.index',compact('datas','data','peminjaman', 'pengembalian', 'barang'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $peminjam = Peminjam::all();
        $data = Barang::all();
        return view('peminjaman.create',compact('data','peminjam'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {    
        $validator = Validator::make($request->all(),[
            'nama_peminjam' => 'required',
            'nama_barang' => 'required',
            'jumlah_pinjam' => 'required|digits_between:0,99999',
            'keperluan' => 'required',
        ],[
            'nama_peminjam.required' => 'Field nama peminjam tidak boleh kosong !',
            'nama_barang.required' => 'Field nama barang tidak boleh kosong !',
            'jumlah_pinjam.required' => 'Field jumlah pinjam tidak boleh kosong !',
            'jumlah_pinjam.digits_between' => 'Jumlah pinjam minimal 1!',
            'keperluan.required' => 'Field keperluan tidak boleh kosong !',
        ]);

        if($validator->fails()){
            return redirect()->to('/peminjaman/create')->withErrors($validator)->withInput();
     }else{
        $barang = Barang::find($request->nama_barang);
        $qty = $barang->qty;
        $pinjam = intval( $request->jumlah_pinjam);

        if($qty>=$pinjam){
            $barang = Barang::find($request->nama_barang);
            $barang->qty -= $request->jumlah_pinjam;        
            $barang->update();    
        }else{
            return redirect()->to('/peminjaman/create')->withErrors(['Error'=>'Jumlah pinjam tidak boleh lebih dari stok yang ada !'])->withInput();
                }
            Peminjaman::create([
            'nama_peminjam' => $request->nama_peminjam,
            'barang_id' => $request->nama_barang,
            'nama_barang' => $request->nama_barang,
            'jumlah_pinjam' => $request->jumlah_pinjam,
            'satuan' => $request->nama_barang,
            'keperluan' => $request->keperluan,
        ]);
        
        return redirect('/peminjaman')->with('success', 'Data berhasil ditambahkan !');
}
        
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            $peminjaman = Peminjaman::findoirfile($id);
            return view('peminjaman.index', compact('peminjaman'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Peminjaman $peminjaman)
    {
        Pengembalian::create([
            'nama_peminjam' => $request->nama_peminjam,
            'peminjaman_id' => $request->id,
            'nama_barang' => $request->nama_barang,
            'jumlah_pinjam' => $request->jumlah_pinjam,
            'tgl_pinjam' => $request->tgl_pinjam,
            'satuan' => $request->satuan,
            'keperluan' => $request->keperluan,
        ]);

        $barang = Barang::find($request->id_barang);
        $barang->qty += $request->jumlah_pinjam;        
        $barang->save();

        Peminjaman::destroy($peminjaman->id);

        return redirect('/peminjaman');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = Pengembalian::find($id);
        $barang->delete();

        return response()->json(['status' => 'Mahasiswa Berhasil di hapus!']);
    }
}