<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
    <div style="columns: 2">
        <p>Nama Siswa   : {{$nama->nama_siswa}}</p>
        <p>NISN         : {{$nama->nisn}}</p>
        <p><br></p>
        <p><br>Tahun Ajaran : {{$semester->tahun_ajaran}}</p>
        <p>Semester     : {{$semester->semester}}</p>
    </div>
	
					<table border="1" style="width:100%;border-collapse: collapse">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Mata Pelajaran</th>
                                <th>Nilai</th>
                                <th>Sikap</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($nilai as $i=>$isi)
                                <tr>
                                    <td style="text-align: center">{{$i+1}}</td>
                                    <td style="text-align: center">{{$isi->nama_matapelajaran}}</td>
                                    <td style="text-align: center">{{$isi->nilai}}</td>
                                    <td style="text-align: center">{{$isi->sikap}}</td>
                                </tr>
                            @endforeach
                            @for ($i = 2; $i <= 10 - count($nilai); $i++)
                            	<tr>
                                    <td>&nbsp;</td>
                            		<td></td>
                                    <td></td>
                                    <td></td>
                            	</tr>

                            @endfor

                        </tbody>
                    </table>
                    <script>
                    	window.print()
                    </script>

</body>
</html>