<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<p>Nama Siswa 	: {{$nama->nama_siswa}}</p>
	{{--<p>Tahun Ajaran : {{$semester->tahun_ajaran}}</p>
	<p>Semester 	: {{$semester->semester}}</p>--}}
					<table border="1" style="width:100%;border-collapse: collapse">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Tahun Ajaran</th>
                                <th>Semester</th>
                                <th>Absensi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($absen as $i=>$isi)
                                <tr>
                                    <td style="text-align: center">{{$i+1}}</td>
                                    <td style="text-align: center">{{$isi->tahun_ajaran}}</td>
                                    <td style="text-align: center">{{$isi->semester}}</td>
                                    <td style="text-align: center">{{date (' d F Y',strtotime($isi->tanggal));}}</td>
                                    <td style="text-align: center"><span class="badge badge-success">{{$isi->absensi}}</span> </td>

                                </tr>
                            @endforeach
                            @for ($i = 1; $i <= 10 - count($absen); $i++)
                            	<tr>
                            		<td>&nbsp;</td>
                            		<td></td>
                            		<td></td>
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