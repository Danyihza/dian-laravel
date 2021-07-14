<html>
<head>
	<title>Arsip Siswa</title>
	<link rel="stylesheet" href="{{asset('assets')}}/css/bootstrap.min.css">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Arsip Siswa</h4>
		<h6><a target="_blank" href="{{ route('dashboard') }}">Dian Institute</a></h5>
	</center>
 
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>NO</th>
				<th>NIS</th>
				<th>NAMA</th>
				<th>KURSUS</th>
				<th>PROGRAM</th>
			</tr>
		</thead>
		<tbody>
			@foreach($siswa as $s)
			<tr>
				<td>{{ $loop->iteration }}</td>
				<td>{{$s->hasSiswa->nis}}</td>
				<td>{{$s->hasSiswa->nama}}</td>
				<td>{{$s->hasDetailKursus->hasKursus->nama_kursus}}</td>
				<td>{{$s->hasDetailKursus->hasProgram->nama_program}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
 
</body>
</html>