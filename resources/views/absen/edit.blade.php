@extends('template')
@section('title')
    Edit Absen
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Edit Absen</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('update_absen')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" name="id_absen" value="
                                    {{$absensi->id_absen}}" class="form-control" hidden >
                                    @error('id_absen')
                                    <i class="text-danger">{{$message}}</i>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Nama Siswa</label>
                                    <select name="id_siswa" id="id_siswa" class="form-control" id="">
                                        <option value="" disabled selected>Select</option>
                                        @foreach ($siswa as $i => $isi)
                                        <option value="{{ $isi->id_siswa}}">{{ $isi->nama_siswa}}</option>
                                        @endforeach
                                        <script>
                                            document.getElementById('id_siswa').value = '{{$absensi->id_siswa}}'
                                        </script>
                                    </select>
                                    @error('nama_siswa')
                                    <i class="text-danger">{{$message}}</i>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Tahun Ajaran</label>
                                    <select name="id_semester" id="id_semester" class="form-control" id="">
                                        <option value="" disabled selected>Select</option>
                                        @foreach ($semester as $i => $isi)
                                        <option value="{{ $isi->id_semester}}">{{ $isi->tahun_ajaran}}</option>
                                        @endforeach
                                        <script>
                                            document.getElementById('id_semester').value = '{{$absensi->id_semester}}'
                                        </script>
                                    </select>
                                    @error('id_semester')
                                    <i class="text-danger">{{$message}}</i>
                                    @enderror
                                </div>
                                {{--<div class="form-group">
                                    <label for="">Semester</label>
                                    <input type="text" name="id_semester" id="id_semester" placeholder="Semester">
                                    @error('nama_siswa')
                                    <i class="text-danger">{{$message}}</i>
                                    @enderror
                                </div>--}}
                                <div class="form-group">
                                    <label for="">Tanggal</label>
                                    <input type="date" name="tanggal" value="{{ $absensi->tanggal}}" class="form-control" placeholder="Tanggal">
                                    @error('tanggal')
                                    <i class="text-danger">{{$message}}</i>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Absensi</label>
                                    <select name="absensi" class="form-control" id="">
                                        <option value="" disabled selected>Select</option>
                                        <option <?= $absensi->absensi == 'Hadir' ? 'selected' : ''?> value="Hadir" >Hadir</option>
                                        <option <?= $absensi->absensi == 'Alpa' ? 'selected' : ''?> value="Hadir" >Alpa</option>
                                        <option <?= $absensi->absensi == 'Izin' ? 'selected' : ''?> value="Izin" >Izin</option>
                                    </select>
                                    @error('absensi')
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
