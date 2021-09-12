<html>
<head>
	<title>Laporan Periode - {{ $tanggal_dari }} s/d {{ $tanggal_sampai }}</title>
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
		<h5>OMSET {{ $cabang->alamat . ' - ' . $cabang->kota}}</h5>
		<h5>Laporan Periode - {{ $tanggal_dari }} s/d {{ $tanggal_sampai }}</h4>
		<h6>Dian Institute</h5>
	</center>
 
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th class='text-center'>NO</th>
				<th class='text-center'>TANGGAL</th>
				<th class='text-center'>NIS</th>
				<th class='text-center'>NAMA</th>
				<th class='text-center'>PROGRAM</th>
				<th class='text-center'>KETERANGAN</th>
				<th class='text-center'>SEBESAR (Rp)</th>
			</tr>
		</thead>
		<tbody>
			@foreach($laporanperiode as $key => $lp)
				@php
				$id_detail_kursus = \App\Models\Pembayaran::where('id_pembayaran', $lp->id_detail_transaksi)->first()->id_detail_kursus;
				// echo $id_detail_kursus;
				$detail_siswa = \App\Models\Fk_detail_siswa::where('id_detail_kursus', $id_detail_kursus)->first();
				$program = $detail_siswa->hasDetailKursus->hasProgram->nama_program;
				$nama = $detail_siswa->hasSiswa->nama;
				$nis = $detail_siswa->hasSiswa->nis;
				@endphp
			<tr>
				<td align="center">{{ $loop->iteration }}</td>
				<td align="center">{{ date('d/m/Y', strtotime($lp->tanggal)) }}</td>
				<td align="center">{{$nis}}</td>
				<td align="center">{{$nama}}</td>
				<td align="center">{{$program}}</td>
				<td align="center">{{$lp->keterangan}}</td>
				<td align="center">{{$lp->jumlah}}</td>
			</tr>
			@endforeach
			<tr>
				<td align="center" colspan="6"><b>Total:</b></td>
				<td align="center"><span class="uang font-medium">{{$total}}</span></td>
			</tr>
		</tbody>
	</table>
 
</body>
</html>