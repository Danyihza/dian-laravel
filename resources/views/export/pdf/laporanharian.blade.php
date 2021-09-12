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
		<h5>OMSET {{ $cabang->alamat . ' - ' . $cabang->kota}}</h5>
		<h5>Laporan Harian - {{ date('d/m/Y', strtotime($tanggal)) }}</h5>
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
			@foreach($laporanharian as $key => $lh)
				@php
				$id_detail_kursus = \App\Models\Pembayaran::where('id_pembayaran', $lh->id_detail_transaksi)->first()->id_detail_kursus;
				// echo $id_detail_kursus;
				$detail_siswa = \App\Models\Fk_detail_siswa::where('id_detail_kursus', $id_detail_kursus)->first();
				$program = $detail_siswa->hasDetailKursus->hasProgram->nama_program;
				$nama = $detail_siswa->hasSiswa->nama;
				$nis = $detail_siswa->hasSiswa->nis;
				@endphp
			<tr>
				<td align="center">{{ $loop->iteration }}</td>
				<td align="center">{{ date('d/m/Y', strtotime($lh->tanggal)) }}</td>
				<td align="center">{{$nis}}</td>
				<td align="center">{{$nama}}</td>
				<td align="center">{{$program}}</td>
				<td align="center">{{$lh->keterangan}}</td>
				<td align="center"><span class="uang">{{$lh->jumlah}}</span></td>
			</tr>
			@endforeach
			<tr>
				<td align="center" colspan="6"><b>Total:</b></td>
				<td align="center"><span class="uang">{{$total}}</span></td>
			</tr>
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