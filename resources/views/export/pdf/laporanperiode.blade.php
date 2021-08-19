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
		<h5>Laporan Periode - {{ $tanggal_dari }} s/d {{ $tanggal_sampai }}</h4>
		<h6><a target="_blank" href="{{ route('dashboard') }}">Dian Institute</a></h5>
	</center>
 
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th class='text-center'>NO</th>
				<th class='text-center'>TANGGAL</th>
				<th class='text-center'>NAMA</th>
				<th class='text-center'>NIS</th>
				<th class='text-center'>KETERANGAN</th>
				<th class='text-center'>PEMASUKAN</th>
				<th class='text-center'>PENGELUARAN</th>
				<th class='text-center'>SALDO</th>
			</tr>
		</thead>
		<tbody>
			@foreach($laporanperiode as $key => $lp)
			@if($lp->jenis_transaksi == 'Pemasukan')
				@php
				$id_detail_kursus = \App\Models\Pembayaran::where('id_pembayaran', $lp->id_detail_transaksi)->first()->id_detail_kursus;
				// echo $id_detail_kursus;
				$detail_siswa = \App\Models\Fk_detail_siswa::where('id_detail_kursus', $id_detail_kursus)->first()->hasSiswa;
				$nama = $detail_siswa->nama;
				$nis = $detail_siswa->nis;
				@endphp
			@else
				@php
				$nama = '-';
				$nis = '-';
				@endphp
			@endif
			<tr>
				<td align="center">{{ $loop->iteration }}</td>
				<td align="center">{{ date('d/m/Y', strtotime($lp->tanggal)) }}</td>
				<td align="center">{{$nama}}</td>
				<td align="center">{{$nis}}</td>
				<td align="center">{{$lp->keterangan}}</td>
				<td align="center">{{$lp->jenis_transaksi == 'Pemasukan' ? $lp->jumlah : ''}}</td>
				<td align="center">{{$lp->jenis_transaksi == 'Pengeluaran' ? $lp->jumlah : ''}}</td>
				<td align="center">{{$saldos[$key]}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
 
</body>
</html>