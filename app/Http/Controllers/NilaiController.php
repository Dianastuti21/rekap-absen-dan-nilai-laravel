<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Nilai;
use Illuminate\Support\Facades\DB;


class NilaiController extends Controller
{
    public function nilai ()
    {
    	$data['nilai'] = DB::table('nilais')
		->join('siswas', 'nilais.id_siswa', '=', 'siswas.id_siswa')
		->join('semesters', 'nilais.id_semester', '=', 'semesters.id_semester')
		->join('matapelajarans', 'nilais.id_mapel', '=', 'matapelajarans.id_mapel')
    	->get();
        return view('nilai.nilai', $data);
    }
    public function input_nilai ()
    {
    	$data['siswa']= DB::table('siswas')->get();
    	$data['semester']= DB::table('semesters')->get();
    	$data['matapelajaran']= DB::table('matapelajarans')->get();
        return view('nilai.input', $data);
    }

    public function rekap_nilai ($id_siswa = null,$id_semester= null)
    {
        $data['id_siswa'] = $id_siswa;
        $data['id_semester'] = $id_semester;

        $data['siswa']= DB::table('siswas')->get();
        $data['semester']= DB::table('semesters')->get();
        return view('nilai.rekap_nilai', $data);
    }

    public function cetak_nilai ($id_siswa = null,$id_semester= null)
    {
        $data['nilai'] = DB::table('nilais')
		->join('siswas', 'nilais.id_siswa', '=', 'siswas.id_siswa')
		->join('semesters', 'nilais.id_semester', '=', 'semesters.id_semester')
		->join('matapelajarans', 'nilais.id_mapel', '=', 'matapelajarans.id_mapel')
		->where('nilais.id_siswa', $id_siswa)
    	->get();

    	$data['nama'] = DB::table('siswas')->where('id_siswa', $id_siswa)->first();
    	$data['semester'] = DB::table('semesters')->where('id_semester', $id_semester)->first();
        return view('nilai.cetak_nilai', $data);
    }

    public function save_nilai(Request $r)
    {
        $validator = Validator::make($r->all(),[
            'id_siswa' => 'required',
            'id_semester' => 'required',
            'id_mapel' => 'required',
            'nilai' => 'required',
            'sikap' => 'required',
        ]);

        if($validator->fails()){
            return redirect('input_nilai')
                ->withErrors($validator)
                ->withInput();
        }

        $simpan = Nilai::insert([
            'id_siswa' => $r->id_siswa,
            'id_semester' => $r->id_semester,
            'id_mapel' => $r->id_mapel,
            'nilai' => $r->nilai,
            'sikap' => $r->sikap,
        ]);

        //dd("aaaaa");
        if ($simpan == TRUE) {
            return redirect('nilai')->with('success','Data berhasil disimpan');
        }else{
            return redirect('nilai')->with('error','Data gagal disimpan');
        }

    }

    public function edit_nilai($id_nilai)
    {
    	$data['nilai'] = DB::table('nilais')->where('id_nilai', $id_nilai)->first();
    	$data['siswa']= DB::table('siswas')->get();
    	$data['semester']= DB::table('semesters')->get();
    	$data['matapelajaran']= DB::table('matapelajarans')->get();
        return view('nilai.edit', $data);
    }

    public function update_nilai(Request $r)
    {
    	$id=$r->id_nilai;
        $validator = Validator::make($r->all(),[
            'id_siswa' => 'required',
            'id_semester' => 'required',
            'id_mapel' => 'required',
            'nilai' => 'required',
            'sikap' => 'required',
        ]);

        if($validator->fails()){
            return redirect('input_nilai')
                ->withErrors($validator)
                ->withInput();
        }

        $simpan = Nilai::where('id_nilai', $id)->update([
           'id_siswa' => $r->id_siswa,
            'id_semester' => $r->id_semester,
            'id_mapel' => $r->id_mapel,
            'nilai' => $r->nilai,
            'sikap' => $r->sikap,
        ]);
        

       
        if ($simpan == TRUE) {
            return redirect('nilai')->with('success','Data berhasil diedit');
        }else{
            return redirect()->route('nilai',$id_nilai)->with('error','Data gagal diedit');
        }

    }


    public function hapus_nilai($id){

        $hapus = DB::table('nilais')->where('id_nilai', $id)->delete();
        if ($hapus == TRUE) {
            return redirect('nilai')->with('success','Data berhasil dihapus');
        }else{
            return redirect('nilai')->with('error','Data gagal dihapus');
        }
    }
}
