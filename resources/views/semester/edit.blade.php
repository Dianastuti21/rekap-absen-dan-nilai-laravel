@extends('template')
@section('title')
    Edit Semester
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Tambah Semester</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('update_semester')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="hidden" name="id_semester" value="{{$semester->id_semester}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Tahun Ajaran</label>
                                    <input type="text" name="tahun_ajaran" value="{{$semester->tahun_ajaran}}"  class="form-control" placeholder="Tahun Ajaran">
                                    @error('tahun_ajaran')
                                    <i class="text-danger">{{$message}}</i>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Semester</label>
                                    <input type="text" name="semester" value="{{$semester->semester}}" class="form-control" placeholder="Semester">
                                    @error('semester')
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
