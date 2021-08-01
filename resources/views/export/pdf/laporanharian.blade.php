<html>
<head>
	<title>Laporan Harian - {{ $tanggal }}</title>
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
		<h5>Laporan Harian - {{ $tanggal }}</h4>
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
				<th class='text-center'>SALDO</th>
			</tr>
		</thead>
		<tbody>
			@foreach($laporanharian as $key => $lh)
			<tr>
				<td align="center">{{ $loop->iteration }}</td>
				<td align="center">{{ date('d/m/Y', strtotime($lh->tanggal)) }}</td>
				<td align="center">{{$lh->keterangan}}</td>
				<td align="center"><span class="uang">{{$lh->jenis_transaksi == 'Pemasukan' ? $lh->jumlah : ''}}</span></td>
				<td align="center"><span class="uang">{{$lh->jenis_transaksi == 'Pengeluaran' ? $lh->jumlah : ''}}</span></td>
				<td align="center"><span class="uang">{{$saldos[$key]}}</span></td>
			</tr>
			@endforeach
		</tbody>
	</table>
 
</body>
</html>
<script src="{{ asset('assets/js/autonumeric@4.1.0.js') }}"></script>
<script>
    new AutoNumeric.multiple('.uang',{
        allowDecimalPadding: false,
        decimalCharacter: ",",
        digitGroupSeparator: '.',
        minimumValue: "0",
        currencySymbol: "Rp ",
    });
</script>