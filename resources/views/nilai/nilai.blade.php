@extends('template')
@section('title')
	Nilai Siswa
@endsection

@section('content')
	<div class="row">
	    <div class="col-md-12">
	        <div class="card">
	            <div class="card-header">
	                <div class="float-left">
	                    <h5>Data Nilai</h5>
	                </div>
	                <div class="float-right">
	                    <a href="{{route('input_nilai')}}" class="btn btn-info btn-sm">Tambah Data</a>
	                </div>
	            </div>
	            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NISN</th>
                            <th>Nama Siswa</th>
                            <th>Nama Mapel</th>
                            <th>Semester</th>
                            <th>Tahun Ajaran</th>
                            <th>Nilai</th>
                            <th>Sikap</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($nilai as $i=> $isi)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $isi->nisn }}</td>
                            <td>{{ $isi->nama_siswa }}</td>
                            <td>{{ $isi->nama_matapelajaran }}</td>
                            <td>{{ $isi->semester }}</td>
                            <td>{{ $isi->tahun_ajaran }}</td>
                            <td>{{ $isi->nilai }}</td>
                            <td>{{ $isi->sikap }}</td>
                            <td>
                                <a href="{{route('edit_nilai', $isi->id_nilai)}}" class=" btn btn-warning btn-block "><i class="fa fa-edit"></i></a>
                                <a href="{{route('hapus_nilai', $isi->id_nilai)}}" class=" btn btn-danger  btn-block "><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
	        </div>
	    </div>
	</div>

@if (session('success') == true)
    <script>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 1500
        })
    </script>

@endif

@endsection