@extends('template')
@section('title')
	Rekap Absen
@endsection

@section('content')
	<div class="row">
	    <div class="col-md-12">
	        <div class="card">
	            <div class="card-header">
	                <div class="float-left">
	                    <h5>Data Absen</h5>
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

                            
                            <!-- <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Bulan</label>
                                    <select style="cursor:pointer;" class="form-control" id="tag_select" name="month">
                                        <option value="0" selected> Pilih Bulan</option>
                                            <?php for( $m=1; $m<=12; ++$m ) { 
                                            $month_label = date('F', mktime(0, 0, 0, $m, 1));
                                            ?>
                                        <option value="<?php echo $month_label; ?>"><?php echo $month_label; ?></option>
                                        <?php } ?>
                                    </select>
                                    @error('semester')
                                    <i class="text-danger">{{$message}}</i>
                                    @enderror
                                </div>
                                <script >
                                    document.getElementById('id_semester').value= '{{Request::get("id_semester")}}'
                                </script>
                            </div>  -->                           

                            <div class="col-md-3">
                            	<br>
		                        <div class="form-group">
		                            <button type="button" onclick="rekaps()" class="btn btn-info btn-block "><i class="fa fa-eye"></i> Lihat Data</button>
		                        </div>
		                    </div>
		                    <div class="col-md-3">
		                    	<br>
		                        <div class="form-group">
		                            <button onclick="cetak()" type="button" class="btn btn-success btn-block "><i class="fa fa-print"></i> Cetak</button>
		                        </div>
		                    </div>
		                </div>
                    <script>
                        function rekaps()
                        {
                           var id = $('#id_siswa').val()
                           var smt = $('#id_semester').val()
                           window.location='{{url('rekap_absen')}}/'+id+'/'+smt
                        }

                        function cetak()
                        {
                           var id = $('#id_siswa').val()
                           var smt = $('#id_semester').val()
                           window.location='{{url('cetak_absen')}}/'+id+'/'+smt
                        }
                    </script>
            </div>
	        </div>
	    </div>
	</div>
    <br>

    @if ($id_siswa != null)
    @php
        $absen = DB::table('absens')
        ->join('siswas', 'absens.id_siswa', '=', 'siswas.id_siswa')
        ->join('semesters', 'absens.id_semester', '=', 'semesters.id_semester')
        ->where('absens.id_siswa', $id_siswa)
        ->where('absens.id_semester', $id_semester)
        ->get();

        $nama= DB::table('siswas')->where('id_siswa', $id_siswa)->first();
        $semester = DB::table('semesters')->where('id_semester', $id_semester)->first();
        
    @endphp

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="">
                    <B>Data Rekap Absen</B>
                    <hr>
                </div>
                <div style="columns: 2;margin-left: 3%">
                    <p>Nama         : {{$nama->nama_siswa}}</p>
                    <p>NISN         : {{$nama->nisn}}</p>
                    <p>Tahun Ajaran : {{$semester->tahun_ajaran}}</p>
                    <p>Semester     : {{$semester->semester}}</p>
                </div>
                    

                <div class="card-body">
                    <table class="table" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Siswa</th>
                                <th>Tahun Ajaran</th>
                                <th>Semester</th>
                                <th>Tanggal</th>
                                <th>Absensi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($absen as $i=>$isi)
                                <tr>
                                    <td>{{$i+1}}</td>
                                    <td>{{$isi->nama_siswa}}</td>
                                    <td>{{$isi->tahun_ajaran}}</td>
                                    <td>{{$isi->semester}}</td>
                                    <td>{{date('d F Y',strtotime($isi->tanggal));}}</td>
                                    <td><span class="badge badge-success">{{$isi->absensi}}</span> </td>

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