<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\Absen;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class AbsenController extends Controller
{
    public function absen ()
    {
    	$data['absen'] = DB::table('absens')
		->join('siswas', 'absens.id_siswa', '=', 'siswas.id_siswa')
		->join('semesters', 'absens.id_semester', '=', 'semesters.id_semester')
    	->get();
        return view('absen.absen', $data);
    }

    public function input_absen ()
    {
    	$data['absensi']= DB::table('siswas')->get();
    	$data['absen']= DB::table('semesters')->get();
        return view('absen.input_absen', $data);
    }

    public function rekap_absen ($id_siswa = null, $id_semester= null)
    {
        $data['id_siswa'] = $id_siswa;
        $data['id_semester'] = $id_semester;
    	$data['siswa']= DB::table('siswas')->get();
    	$data['semester']= DB::table('semesters')->get();
        return view('absen.rekap_absen', $data);
    }

    public function cetak_absen ($id_siswa = null, $id_semester= null)
    {
        $data['absen'] = DB::table('absens')
		->join('siswas', 'absens.id_siswa', '=', 'siswas.id_siswa')
		->join('semesters', 'absens.id_semester', '=', 'semesters.id_semester')
		->where('absens.id_siswa', $id_siswa)
    	->get();

    	$data['nama'] = DB::table('siswas')->where('id_siswa', $id_siswa)->first();
        return view('absen.cetak_absen', $data);
    }

    public function save_absen(Request $r)
    {
        $validator = Validator::make($r->all(),[
            'id_siswa' => 'required',
            'id_semester' => 'required',
            'tanggal' => 'required',
            'absensi' => 'required',
        ]);

        if($validator->fails()){
            return redirect('input_absen')
                ->withErrors($validator)
                ->withInput();
        }

        $simpan = Absen::insert([
            'id_siswa' => $r->id_siswa,
            'id_semester' => $r->id_semester,
            'tanggal' => $r->tanggal,
            'absensi' => $r->absensi,
        ]);

        //dd("aaaaa");
        if ($simpan == TRUE) {
            return redirect('absensi')->with('success','Data berhasil disimpan');
        }else{
            return redirect('input_absen')->with('error','Data gagal disimpan');
        }

    }

    public function edit_absen($id_absen)
    {
    	$data['absensi'] = DB::table('absens')->where('id_absen', $id_absen)->first();
    	$data['siswa']= DB::table('siswas')->get();
    	$data['semester']= DB::table('semesters')->get();
        return view('absen.edit', $data);
    }

    public function update_absen(Request $r)
    {
    	$id=$r->id_absen;
        $validator = Validator::make($r->all(),[
            'id_siswa' => 'required',
            'id_semester' => 'required',
            'tanggal' => 'required',
            'absensi' => 'required',
        ]);

        if($validator->fails()){
            return redirect('input_absen')
                ->withErrors($validator)
                ->withInput();
        }

        $simpan = Absen::where('id_absen', $id)->update([
           'id_siswa' => $r->id_siswa,
           'id_semester' => $r->id_semester,
           'tanggal' => $r->tanggal,
           'absensi' => $r->absensi,
        ]);
        

       
        if ($simpan == TRUE) {
            return redirect('absensi')->with('success','Data berhasil diedit');
        }else{
            return redirect()->route('edit_absen',$id_absen)->with('error','Data gagal diedit');
        }

    }

    public function hapus_absen($id){

        $hapus = DB::table('absens')->where('id_absen', $id)->delete();
        if ($hapus == TRUE) {
            return redirect('absensi')->with('success','Data berhasil dihapus');
        }else{
            return redirect('absensi')->with('error','Data gagal dihapus');
        }
    }
}
