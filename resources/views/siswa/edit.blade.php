@extends('template')
@section('title')
    Tambah Siswa
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Tambah Siswa</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('update-siswa')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="hidden" name="id_siswa" value="{{$siswa->id_siswa}}" class="form-control" placeholder="Nama">
                                </div>
                                <div class="form-group">
                                    <label for="">Nama Siswa</label>
                                    <input type="text" name="nama_siswa" value="{{$siswa->nama_siswa}}" class="form-control" placeholder="Nama">
                                    @error('nama_siswa')
                                    <i class="text-danger">{{$message}}</i>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">NISN Siswa</label>
                                    <input type="text" name="nisn" value="{{$siswa->nisn}}" class="form-control" placeholder="NISN">
                                    @error('nisn')
                                    <i class="text-danger">{{$message}}</i>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control" id="">
                                        <option value="" disabled selected>Select</option>
                                        <option <?= $siswa->jenis_kelamin == 'Laki-laki' ? 'selected' : ''?> value="Laki-laki">Laki-laki</option>
                                        <option <?= $siswa->jenis_kelamin == 'Perempuan' ? 'selected' : ''?> value="Perempuan">Perempuan</option>
                                    </select>
                                    @error('jenis_kelamin')
                                    <i class="text-danger">{{$message}}</i>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Alamat</label>
                                    <input type="text" name="alamat" value="{{$siswa->alamat}}" class="form-control" placeholder="Alamat">
                                    @error('alamat')
                                    <i class="text-danger">{{$message}}</i>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Agama</label>
                                    <select name="agama" class="form-control" id="">
                                        <option value="" disabled selected>Select</option>
                                        <option <?= $siswa->agama == 'Islam' ? 'selected' : ''?> value="Islam">Islam</option>
                                        <option <?= $siswa->agama == 'Kristen' ? 'selected' : ''?> value="Kristen">Kristen</option>
                                        <option <?= $siswa->agama == 'Katholik' ? 'selected' : ''?> value="Katholik">Katholik</option>
                                        <option <?= $siswa->agama == 'Hindu' ? 'selected' : ''?> value="Hindu">Hindu</option>
                                        <option <?= $siswa->agama == 'Budha' ? 'selected' : ''?> value="Budha">Budha</option>
                                    </select>
                                    @error('agama')
                                    <i class="text-danger">{{$message}}</i>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Gambar</label><br>
                                    <i><?= $siswa->gambar ?></i>
                                    <input type="file" name="gambar" class="form-control" placeholder="Gambar">
                                    @error('gambar')
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
