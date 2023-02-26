<?php

namespace App\Http\Controllers;

use App\Models\Peminjam;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class PeminjamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peminjam = Peminjam::latest()->paginate();
        return view('peminjam.index', compact('peminjam'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('peminjam.register');
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
            'email' => 'required|unique:peminjam',
            'nama' => 'required',
            'no_wa' => 'required|numeric|digits_between:1,15',
            'kelas' => 'required',
            'alamat' => 'required',
        ],[
            'email.required' => 'Email wajib di isi !',
            'email.unique' => 'Email sudah terdaftar, jika terjadi kesalahan hubungi admin !',
            'nama.required' => 'Nama wajib di isi !',
            'nama.digits' => 'Nama tidak valid atau terlalu panjang !',
            'no_wa.digits_between' => 'No Wa tidak valid !',
            'no_wa.required' => 'No Whatshap harus di isi !',
            'kelas.required' => 'Kelas harus di isi !',
            'alamat.required' => 'Alamat harus di isi !',
        ]);

        Peminjam::create([
            'email' => $request->email,
            'nama' => $request->nama,
            'no_wa' => $request->no_wa,
            'kelas' => $request->kelas,
            'alamat' => $request->alamat,
        ]);

        return redirect('/sesi')->with('success','Data berhasil di simpan, silahkan hubungi admin untuk meminjam barang !');
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
    public function edit(Peminjam $peminjam)
    {
        return view('peminjam.edit',[
            'peminjam' => $peminjam
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Peminjam $peminjam)
    {
        $this->validate($request,[
            'nama' => 'required',
            'no_wa' => 'required|numeric|digits_between:1,15',
            'kelas' => 'required',
            'alamat' => 'required',
        ],[
            'email.required' => 'Email wajib di isi !',
            'email.unique' => 'Email sudah terdaftar, jika terjadi kesalahan hubungi admin !',
            'nama.required' => 'Nama wajib di isi !',
            'nama.digits' => 'Nama tidak valid atau terlalu panjang !',
            'no_wa.digits_between' => 'No Wa tidak valid !',
            'no_wa.required' => 'No Whatshap harus di isi !',
            'kelas.required' => 'Kelas harus di isi !',
            'alamat.required' => 'Alamat harus di isi !',
        ]);
        
        $rules=([
            'email' => 'required',
            'nama' => 'required',
            'no_wa' => 'required',
            'kelas' => 'required',
            'alamat' => 'required',
        ]);

        if($request->email != $peminjam->email){
            $rules['email'] = 'required|unique:peminjam|max:50';
        }

        $validateData = $request->validate($rules);

        Peminjam::where('id', $peminjam->id)
        ->update($validateData);

        return Redirect('/peminjam')->with('success', 'Data berhasil diupdate !');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $peminjam = Peminjam::find($id);
        $peminjam->delete();

        return response()->json(['status' => 'Data Berhasil di hapus!']);
    }
}
