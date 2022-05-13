@extends('template')
@section('title')
    Tambah Nilai
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Tambah Nilai</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('update_nilai')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-group">
                                    <input type="text" name="id_nilai" value="{{ $nilai->id_nilai}}" class="form-control" hidden>
                                    @error('nilai')
                                    <i class="text-danger">{{$message}}</i>
                                    @enderror
                                </div>
                                    <label for="">Nama Siswa</label>
                                    <select name="id_siswa" class="form-control" id="id_siswa">
                                        <option value="" disabled selected>Select</option>
                                        @foreach ($siswa as $i => $isi)
                                        <option value="{{ $isi->id_siswa}}">{{ $isi->nama_siswa}}</option>
                                        @endforeach
                                        <script>
                                            document.getElementById('id_siswa').value = '{{$nilai->id_siswa}}'
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
                                            document.getElementById('id_semester').value = '{{$nilai->id_semester}}'
                                        </script>
                                    </select>
                                    @error('id_semester')
                                    <i class="text-danger">{{$message}}</i>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Nama Matapelajaran</label>
                                    <select name="id_mapel" id="id_mapel" class="form-control" >
                                        <option value="" disabled selected>Select</option>
                                        @foreach ($matapelajaran as $i => $isi)
                                        <option value="{{ $isi->id_mapel}}">{{ $isi->nama_matapelajaran}}</option>
                                        @endforeach
                                        <script>
                                            document.getElementById('id_mapel').value = '{{$nilai->id_mapel}}'
                                        </script>
                                    </select>
                                    @error('id_mapel')
                                    <i class="text-danger">{{$message}}</i>
                                    @enderror
                                </div>
                                <!-- <div class="form-group">
                                    <label for="">Semester</label>
                                    <select name="semester" class="form-control" id="">
                                        <option value="" disabled selected>Select</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                    @error('semester')
                                    <i class="text-danger">{{$message}}</i>
                                    @enderror
                                </div> -->
                                <div class="form-group">
                                    <label for="">Nilai</label>
                                    <input type="text" name="nilai" value="{{ $nilai->nilai}}" class="form-control" placeholder="Nilai">
                                    @error('nilai')
                                    <i class="text-danger">{{$message}}</i>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Sikap</label>
                                    <select name="sikap" class="form-control" id="">
                                        <option value="" disabled selected>Select</option>
                                        <option <?= $nilai->sikap == 'Sangat Baik' ? 'selected' : ''?> value="Sangat Baik">Sangat Baik</option>
                                        <option <?= $nilai->sikap == 'Baik' ? 'selected' : ''?> value="Baik">Baik</option>
                                        <option <?= $nilai->sikap == 'Cukup' ? 'selected' : ''?> value="Cukup">Cukup</option>
                                        <option <?= $nilai->sikap == 'Kurang' ? 'selected' : ''?> value="Kurang">Kurang</option>
                                        <option <?= $nilai->sikap == 'Sangat Kurang' ? 'selected' : ''?> value="Sangat Kurang">Sangat Kurang</option>
                                    </select>
                                    @error('jenis_kelamin')
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
