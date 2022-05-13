@extends('template')
@section('title')
	Absen Siswa
@endsection

@section('content')
	<div class="row">
	    <div class="col-md-12">
	        <div class="card">
	            <div class="card-header">
	                <div class="float-left">
	                    <h5>Data Absen</h5>
	                </div>
	                <div class="float-right">
	                    <a href="{{route('input_absen')}}" class="btn btn-info btn-sm">Tambah Data</a>
	                </div>
	            </div>
	            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Tahun Ajaran</th>
                            <th>Semester</th>
                            <th>Tanggal</th>
                            <th>Absensi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($absen as $i=> $isi)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $isi->nama_siswa }}</td>
                            <td>{{ $isi->tahun_ajaran }}</td>
                            <td>{{ $isi->semester }}</td>
                            <td>{{date('d F Y',strtotime($isi->tanggal));}}</td>
                            <td>{{ $isi->absensi}}</td>
                            <td>
                                <a href="{{route('edit_absen', $isi->id_absen)}}" class=" btn btn-warning btn-block "><i class="fa fa-edit"></i></a>
                                <a onclick="return confirm('Yakin Ingin Menghapus Data?')" href="{{route('hapus_absen', $isi->id_absen)}}" class=" btn btn-danger  btn-block "><i class="fa fa-trash"></i></a>
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

@if (session('error') == true)
    <script>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: '{{ session('error') }}',
            showConfirmButton: false,
            timer: 1500
        })
    </script>

@endif

@endsection