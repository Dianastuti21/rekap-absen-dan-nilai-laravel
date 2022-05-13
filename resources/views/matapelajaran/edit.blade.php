@extends('template')
@section('title')
    Edit Matapelajaran
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Edit Matapelajaran</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('update_mapel')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="hidden" name="id_mapel" value="{{$matapelajaran->id_mapel}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Kode Matapelajaran</label>
                                    <input type="text" name="kode_matapelajaran" value="{{$matapelajaran->kode_matapelajaran}}" class="form-control" placeholder="Kode Matapelajaran" readonly>
                                    @error('kode_matapelajaran')
                                    <i class="text-danger">{{$message}}</i>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Nama Matapelajaran</label>
                                    <input type="text" name="nama_matapelajaran" value="{{$matapelajaran->nama_matapelajaran}}" class="form-control" placeholder="Nama Matapelajaran">
                                    @error('nama_matapelajaran')
                                    <i class="text-danger">{{$message}}</i>
                                    @enderror
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-block ">Simpan</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
