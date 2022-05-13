<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Matapelajaran;
use Illuminate\Support\Facades\DB;

class MatapelajaranController extends Controller
{
    public function matapelajaran ()
    {
    	$data['matapelajaran'] = DB::table('matapelajarans')->get();
        return view('matapelajaran.matapelajaran', $data);
    }

    public function input_matapelajaran ()
    {
        return view('matapelajaran.input_matapelajaran');
    }

    public function save_data(Request $r)
    {
        $validator = Validator::make($r->all(),[
            'kode_matapelajaran' => 'required',
            'nama_matapelajaran' => 'required',
        ]);

        if($validator->fails()){
            return redirect('input_matapelajaran')
                ->withErrors($validator)
                ->withInput();
        }
        
        $simpan = Matapelajaran::insert([
            'kode_matapelajaran' => $r->kode_matapelajaran,
            'nama_matapelajaran' => $r->nama_matapelajaran,
            
        ]);

        if ($simpan == TRUE) {
            return redirect('matapelajaran')->with('success','Data berhasil disimpan');
        }else{
            return redirect('input_matapelajaran')->with('error','Data gagal disimpan');
        }

    }
    
    public function edit_mapel($id)
    {
            $data['matapelajaran'] = DB ::table('matapelajarans')->where('id_mapel', $id)->first();
            return view('matapelajaran.edit',$data);
    }

    public function update_mapel(Request $r)
    {
    	$id=$r->id_mapel;
        $validator = Validator::make($r->all(),[
            'kode_matapelajaran' => 'required',
            'nama_matapelajaran' => 'required',
        ]);

        if($validator->fails()){
            return redirect('input_matapelajaran')
                ->withErrors($validator)
                ->withInput();
        }

        $simpan = Matapelajaran::where('id_mapel', $id)->update([
           'kode_matapelajaran' => $r->kode_matapelajaran,
           'nama_matapelajaran' => $r->nama_matapelajaran,
        ]);
        

       
        if ($simpan == TRUE) {
            return redirect('matapelajaran')->with('success','Data berhasil diedit');
        }else{
            return redirect()->route('edit_mapel',$id_mapel)->with('error','Data gagal diedit');
        }

    }

    public function hapus_mapel($id){

        $hapus = DB::table('matapelajarans')->where('id_mapel', $id)->delete();
        if ($hapus == TRUE) {
            return redirect('matapelajaran')->with('success','Data berhasil dihapus');
        }else{
            return redirect('matapelajaran')->with('error','Data gagal dihapus');
        }
    }


}
