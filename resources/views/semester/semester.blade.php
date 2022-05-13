@extends('template')
@section('title')
	Semester
@endsection

@section('content')
	<div class="row">
	    <div class="col-md-12">
	        <div class="card">
	            <div class="card-header">
	                <div class="float-left">
	                    <h5>Data Semester</h5>
	                </div>
	                <div class="float-right">
	                    <a href="{{route('input_semester')}}" class="btn btn-info btn-sm">Tambah Data</a>
	                </div>
	            </div>
	            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tahun Ajaran</th>
                            <th>Semester</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($semester as $i=> $isi)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $isi->tahun_ajaran }}</td>
                            <td>{{ $isi->semester }}</td>
                            <td>
                                <a href="{{route('edit_semester',$isi->id_semester)}}" class=" btn btn-warning btn-block "><i class="fa fa-edit"></i></a>
                                <a href="{{route('hapus_semester',$isi->id_semester)}}" class=" btn btn-danger  btn-block "><i class="fa fa-trash"></i></a>
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