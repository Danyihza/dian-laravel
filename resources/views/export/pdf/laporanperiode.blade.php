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
				<th class='text-center'>KETERANGAN</th>
				<th class='text-center'>PEMASUKAN</th>
				<th class='text-center'>PENGELUARAN</th>
			</tr>
		</thead>
		<tbody>
			@foreach($laporanperiode as $lp)
			<tr>
				<td align="center">{{ $loop->iteration }}</td>
				<td align="center">{{ date('d/m/Y', strtotime($lp->tanggal)) }}</td>
				<td align="center">{{$lp->keterangan}}</td>
				<td align="center">{{$lp->jenis_transaksi == 'Pemasukan' ? $lp->jumlah : ''}}</td>
				<td align="center">{{$lp->jenis_transaksi == 'Pengeluaran' ? $lp->jumlah : ''}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
 
</body>
</html>