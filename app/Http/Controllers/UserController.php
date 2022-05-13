<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
     public function login (){
    	return view('page.login');
    }
    public function register (){
    	return view('page.register');
    }

    public function daftar(Request $r){
    	$validator = Validator::make($r->all(),[
            'nama' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
        	return back();
        }

        $simpan = DB::table('userapps')->insert([
            'nama' => $r->nama,
            'username' => $r->username,
            'password' => Hash::make($r->password),
            
        ]);
        dd($simpan);

        if ($simpan == TRUE) {
            return redirect('/')->with('success','Data berhasil disimpan');
        }else{
            return redirect('register')->with('error','Data gagal disimpan');
        }

    }

    public function aksi_login(Request $r)
    {
    	$aksi_login = $r->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);


        if (Auth::guard('login')->attempt($aksi_login)) {
        	$r->session()->regenerate();
        	return redirect('home');
        }

        return back();
    }
    public function logout(Request $r){
        Auth::guard('login')->logout();
        $r->session()->regenerateToken();
        return redirect('/');
    }
}
