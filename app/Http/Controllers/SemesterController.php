<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Semester;
use Illuminate\Support\Facades\DB;

class SemesterController extends Controller
{
    public function semester ()
    {
    	$data['semester'] = DB::table('semesters')->get();
        return view('semester.semester', $data);
    }

    public function input_semester ()
    {
        return view('semester.input_semester');
    }

    public function save_data(Request $r)
    {
        $validator = Validator::make($r->all(),[
            'tahun_ajaran' => 'required',
            'semester' => 'required',
        ]);

        if($validator->fails()){
            return redirect('input_semester')
                ->withErrors($validator)
                ->withInput();
        }
        
        $simpan = Semester::insert([
            'tahun_ajaran' => $r->tahun_ajaran,
            'semester' => $r->semester,
            
        ]);

        if ($simpan == TRUE) {
            return redirect('semester')->with('success','Data berhasil disimpan');
        }else{
            return redirect('input_semester')->with('error','Data gagal disimpan');
        }

    }

    public function edit_semester($id)
    {
            $data['semester'] = DB ::table('semesters')->where('id_semester', $id)->first();
            return view('semester.edit',$data);
    }

    public function update_semester(Request $r)
    {
    	$id=$r->id_semester;
        $validator = Validator::make($r->all(),[
            'tahun_ajaran' => 'required',
            'semester' => 'required',
        ]);

        if($validator->fails()){
            return redirect('input_semester')
                ->withErrors($validator)
                ->withInput();
        }

        $simpan = Semester::where('id_semester', $id)->update([
           'tahun_ajaran' => $r->tahun_ajaran,
            'semester' => $r->semester,
        ]);
        

       
        if ($simpan == TRUE) {
            return redirect('semester')->with('success','Data berhasil diedit');
        }else{
            return redirect()->route('edit_semester',$id)->with('error','Data gagal diedit');
        }

    }

     public function hapus_semester($id){

        $hapus = DB::table('semesters')->where('id_semester', $id)->delete();
        if ($hapus == TRUE) {
            return redirect('semester')->with('success','Data berhasil dihapus');
        }else{
            return redirect('semester')->with('error','Data gagal dihapus');
        }
    }
}
