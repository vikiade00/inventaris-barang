<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Redirect;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Barang::latest()->paginate();
        return view('barang.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'kode_barang' => 'required|unique:barang|max:50',
            'nama_barang' => 'required',
            'qty' => 'required|numeric',
            'satuan' => 'required',
        ],[
            'kode_barang.required' => 'Kode barang wajib di isi',
            'kode_barang.unique' => 'Kode barang sudah ada tolong cek kembali',
            'nama_barang.required' => 'Nama Barang wajib di isi',
            'qty.required' => 'qty wajib di isi',
            'satuan.required' => 'satuan wajib di isi',
        ]);

        Barang::create([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'qty' => $request->qty,
            'satuan' => $request->satuan,
        ]);

        return redirect('/barang')->with('success', 'Data berhasil ditambahkan !');
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
    public function edit(Barang $barang)
    {
    return view('barang.edit',[
        'barang' => $barang
    ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {
       
        $this->validate($request,[
            'nama_barang' => 'required',
            'qty' => 'required|numeric',
            'satuan' => 'required',
        ],[
            'kode_barang.required' => 'Kode barang wajib di isi',
            'kode_barang.unique' => 'Kode barang tidak boleh sama',
            'nama_barang.required' => 'Nama Barang wajib di isi',
            'qty.required' => 'qty wajib di isi',
            'satuan.required' => 'satuan wajib di isi',
        ]);
       
        $rules=[
            'nama_barang' => 'required',
            'qty' => 'required',
            'satuan' => 'required',
        ];

        if($request->kode_barang != $barang->kode_barang){
            $rules['kode_barang'] = 'required|unique:barang|max:50';    
        }

        $validateData = $request->validate($rules);

        Barang::where('id', $barang->id)
        ->update($validateData);

        return Redirect('/barang')->with('success', 'Data berhasil diupdate !');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $barang = Barang::find($id);
        $barang->delete();

        return response()->json(['status' => 'Data Berhasil di hapus!']);
    }

}
