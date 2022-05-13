@extends('template')
@section('title')
	Siswa
@endsection

@section('content')
	<div class="row">
	    <div class="col-md-12">
	        <div class="card">
	            <div class="card-header">
	                <div class="float-left">
	                    <h5>Data Siswa</h5>
	                </div>
	                <div class="float-right">
	                    <a href="{{route('input_siswa')}}" class="btn btn-info btn-sm">Tambah Data</a>
	                </div>
	            </div>
	            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Agama</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($siswa as $i=> $isi)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $isi->nama_siswa }}</td>
                            <td>{{ $isi->jenis_kelamin }}</td>
                            <td>{{ $isi->alamat }}</td>
                            <td>{{ $isi->agama }}</td>
                            <td><img src="{{asset('gambar/'. $isi->gambar)}}" width="30%" alt=""></td>
                            <td>
                                <a href="{{route('edit_siswa', $isi->id_siswa)}}" class=" btn btn-warning btn-block "><i class="fa fa-edit"></i></a>
                                <a href="{{route('hapus-siswa', $isi->id_siswa)}}" class=" btn btn-danger  btn-block "><i class="fa fa-trash"></i></a>
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