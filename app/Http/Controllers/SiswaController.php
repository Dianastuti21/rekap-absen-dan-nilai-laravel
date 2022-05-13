<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Siswa;
use Illuminate\Support\Facades\DB;


class SiswaController extends Controller
{
	public function siswa ()
    {
    	$data['siswa'] = DB::table('siswas')->get();
        return view('siswa.siswa',$data);
    }

    public function input_siswa ()
    {
        return view('siswa.input_siswa');
    }

    public function save(Request $r)
    {
        $validator = Validator::make($r->all(),[
            'nama_siswa' => 'required',
            'nisn' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'agama' => 'required',
            'gambar' =>'required',
            'jenis_kelamin' => 'required',
        ]);

        if($validator->fails()){
            return redirect('input_siswa')
                ->withErrors($validator)
                ->withInput();
        }
        $file= $r->file('gambar');
        $fileName= $file->getClientOriginalName();
        $file->move('gambar/', $fileName);

        $simpan = Siswa::insert([
            'nama_siswa' => $r->nama_siswa,
            'nisn' => $r->nisn,
            'jenis_kelamin' => $r->jenis_kelamin,
            'alamat' => $r->alamat,
            'agama' => $r->agama,
            'gambar' => $fileName,
        ]);

        if ($simpan == TRUE) {
            return redirect('siswa')->with('success','Data berhasil disimpan');
        }else{
            return redirect('input_siswa')->with('error','Data gagal disimpan');
        }

    }

    public function edit_siswa($id)
    {
            $data['siswa'] = DB ::table('siswas')->where('id_siswa', $id)->first();
            return view('siswa.edit',$data);
    }

    public function updatesiswa(Request $r)
    {
    	$id=$r->id_siswa;
        $validator = Validator::make($r->all(),[
            'nama_siswa' => 'required',
            'nisn' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'agama' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        if($validator->fails()){
            return redirect('input-user')
                ->withErrors($validator)
                ->withInput();
        }

        if ($r->file('gambar') == NULL) {
            $simpan = Siswa::where('id_siswa', $id)->update([
            'nama_siswa' => $r->nama_siswa,
            'nisn' => $r->nisn,
            'alamat' => $r->alamat,
            'agama' => $r->agama,
            'jenis_kelamin' => $r->jenis_kelamin,
        ]);
        }else{
            $fotolama= DB::table('siswas')->where('id_siswa', $id)->first();
            //dd($fotolama);
            if ($fotolama->gambar != NULL) {
                unlink('gambar/'. $fotolama->gambar);
            }

            $file= $r->file('gambar');
            $fileName= $file->getClientOriginalName();
            $file->move('gambar/', $fileName);

            $simpan = Siswa::where('id_siswa', $id)->update([
            'nama_siswa' => $r->nama_siswa,
            'nisn' => $r->nisn,
            'alamat' => $r->alamat,
            'agama' => $r->agama,
            'gambar' => $fileName,
            'jenis_kelamin' => $r->jenis_kelamin,
        ]);
        }

        

        if ($simpan == TRUE) {
            return redirect('siswa')->with('success','Data berhasil diedit');
        }else{
            return redirect()->route('edit_siswa',$id_siswa)->with('error','Data gagal diedit');
        }

    }

    public function hapus($id){
        $fotolama= DB::table('siswas')->where('id_siswa', $id)->first();
            //dd($fotolama);
            if ($fotolama->gambar != NULL) {
                unlink('gambar/'. $fotolama->gambar);
            }

        $hapus = DB::table('siswas')->where('id_siswa', $id)->delete();
        if ($hapus == TRUE) {
            return redirect('siswa')->with('success','Data berhasil dihapus');
        }else{
            return redirect('siswa')->with('error','Data gagal dihapus');
        }
    }

   
}
