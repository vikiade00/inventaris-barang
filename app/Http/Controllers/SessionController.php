<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    function index(){
        return view("login/index");
    }

    function login(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ],[
            'username.required' => 'Username tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong'
        ]);

        $infologin = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if(Auth::attempt($infologin)){
            return redirect('dashboard')->with('success','SELAMAT DATANG ADMIN :)');    
        }else{
            return redirect('sesi')->withErrors(['Error'=>'Username atau password salah, tolong cek kembali !'])->withInput();
        }
    }

    function logout(){
        Auth::logout();
        return redirect('/sesi')->with('success','Telah berhasil log out !');
    }

}
