@extends('template')
@section('title')
    Tambah Matapelajaran
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Tambah Matapelajaran</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('simpan_data')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Kode Matapelajaran</label>
                                    <input type="text" name="kode_matapelajaran" value="<?php echo 'MP-'.time()?>" class="form-control" placeholder="Kode Matapelajaran">
                                    @error('kode_matapelajaran')
                                    <i class="text-danger">{{$message}}</i>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Nama Matapelajaran</label>
                                    <input type="text" name="nama_matapelajaran" class="form-control" placeholder="Nama Matapelajaran">
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
