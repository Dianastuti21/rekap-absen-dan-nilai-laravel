@extends('template')
@section('title')
	Rekap Nilai
@endsection

@section('content')
	<div class="row">
	    <div class="col-md-12">
	        <div class="card">
	            <div class="card-header">
	                <div class="float-left">
	                    <h5>Data Nilai</h5>
	                </div>
	            </div>
	            <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Nama Siswa</label>
                                    <select name="id_siswa" class="form-control" id="id_siswa">
                                        <option value="" disabled selected>Select</option>
                                        @foreach ($siswa as $i => $isi)
                                        <option value="{{ $isi->id_siswa}}">{{ $isi->nama_siswa}}</option>
                                        @endforeach
                                    </select>
                                    @error('nama_siswa')
                                    <i class="text-danger">{{$message}}</i>
                                    @enderror
                                </div>
                                <script >
                                	document.getElementById('id_siswa').value= '{{$id_siswa}}'
                                </script>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Tahun Ajaran</label>
                                    <select name="id_semester" id="id_semester" class="form-control" id="id_siswa">
                                        <option value="" disabled selected>Select</option>
                                        @foreach ($semester as $i => $isi)
                                        <option value="{{ $isi->id_semester}}">{{ $isi->tahun_ajaran}}</option>
                                        @endforeach
                                    </select>
                                    @error('semester')
                                    <i class="text-danger">{{$message}}</i>
                                    @enderror
                                </div>
                                <script >
                                    document.getElementById('id_semester').value= '{{$id_semester}}'
                                </script>
                            </div>
                            	&nbsp;
                            	&nbsp;
                            <div>
		                        <div class="form-group">
		                            <button type="button" onclick="rekaps()" class="btn btn-info btn-block"><i class="fa fa-eye"></i> Lihat Data</button>
		                        </div>
		                    </div>
		                    &nbsp;
                            &nbsp;
		                    <div>
		                    	<div class="form-group">
		                            <button onclick="cetak()" type="button" class="btn btn-success btn-block"><i class="fa fa-print"></i> Cetak</button>
		                        </div>
		                    </div>
		                    
		                </div>
                    <script>
                        function rekaps()
                        {
                           var id = $('#id_siswa').val()
                           var smt = $('#id_semester').val()
                           window.location='{{url('rekap_nilai')}}/'+id+'/'+smt
                        }

                        function cetak()
                        {
                           var id = $('#id_siswa').val()

                           var smt = $('#id_semester').val()
                           window.location='{{url('cetak_nilai')}}/'+id+'/'+smt
                        }
                    </script>
            </div>
	        </div>
	    </div>
	</div>
    <br>
    @if ($id_siswa != null)
    @php
        $nilai = DB::table('nilais')
        ->join('siswas', 'nilais.id_siswa', '=', 'siswas.id_siswa')
        ->join('semesters', 'nilais.id_semester', '=', 'semesters.id_semester')
        ->join('matapelajarans', 'nilais.id_mapel', '=', 'matapelajarans.id_mapel')
        ->where('nilais.id_siswa', $id_siswa)
        ->get();

        $nama= DB::table('siswas')->where('id_siswa', $id_siswa)->first();
        $semester = DB::table('semesters')->where('id_semester', $id_semester)->first();
        
    @endphp

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="">
                        <B>Data Rekap Nilai</B>
                        <hr>
                    </div>
                    
                    <div style="columns: 2;margin-left: 3%">
                    	<p>Nama         : {{$nama->nama_siswa}}</p>
                        <p>NISN         : {{$nama->nisn}}</p>
                        <p>Tahun Ajaran : {{$semester->tahun_ajaran}}</p>
                        <p>semester     : {{$semester->semester}}</p>
                    </div>

                    <div class="card-body">
                        <table class="table" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Nilai</th>
                                    <th>Sikap</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($nilai as $i=>$isi)
                                    <tr>
                                        <td>{{$i+1}}</td>
                                        <td>{{$isi->nama_matapelajaran}}</td>
                                        <td>{{$isi->nilai}}</td>
                                        <td>{{$isi->sikap}}</td>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
 @endif

@endsection