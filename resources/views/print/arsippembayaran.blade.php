<html>

<head>
    <title>Edit Pembayaran - {{ $siswa->nis }}</title>
    <link rel="stylesheet" href="{{asset('assets')}}/css/bootstrap.min.css">
</head>
<style type="text/css">
	table tr td,
	table tr th {
		font-size: 12pt;
	}

	body{
		width: 21cm;
		height: 29.7cm;
		padding: 3cm 3cm 3cm 4cm;
	}

</style>

<body>

	<h3 class="text-center">Edit Pembayaran</h3>
    <table class="my-5" style="undefined;table-layout: fixed; width: 302px">
        <colgroup>
            <col style="width: 112px">
            <col style="width: 25px">
            <col style="width: 165px">
        </colgroup>
		<tbody>
            <tr>
                <td>NIS</td>
                <td>:</td>
                <td>{{ $siswa->nis }}</td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td>{{ $siswa->nama }}</td>
            </tr>
            <tr>
                <td>Kursus</td>
                <td>:</td>
                <td>{{ $detail_kursus->hasKursus->nama_kursus }}</td>
            </tr>
            <tr>
                <td>Program</td>
                <td>:</td>
                <td>{{ $detail_kursus->hasProgram->nama_program }}</td>
            </tr>
            <tr>
                <td>Level</td>
                <td>:</td>
                <td>{{ $detail_kursus->hasLevel->nama_level }}</td>
            </tr>
            <tr>
                <td>Pendidikan</td>
                <td>:</td>
                <td>{{ $siswa->pendidikan }}</td>
            </tr>
        </tbody>
    </table>

	<h3 class="text-center">Detail Pembiayaan</h3>
	<table class="my-5" style="undefined;table-layout: fixed; width: 302px">
        <colgroup>
            <col style="width: 200px">
            <col style="width: 25px">
            <col style="width: 165px">
        </colgroup>
		<tbody>
            <tr>
                <td>Uang Pendaftaran</td>
                <td>:</td>
                <td class="harga">{{ $detail_kursus->uang_pendaftaran }}</td>
            </tr>
            <tr>
                <td>Uang Kursus</td>
                <td>:</td>
                <td class="harga">{{ $detail_kursus->uang_kursus }}</td>
            </tr>
            <tr>
                <td>Uang Ujian & Sertifikat</td>
                <td>:</td>
                <td class="harga">{{ $detail_kursus->uang_ujian_sertifikat }}</td>
            </tr>
            <tr>
                <td>Uang Buku</td>
                <td>:</td>
                <td class="harga">{{ $detail_kursus->uang_buku }}</td>
            </tr>
            <tr>
                <td>Uang Peralatan</td>
                <td>:</td>
                <td class="harga">{{ $detail_kursus->uang_peralatan }}</td>
            </tr>
            <tr>
                <td>Total Biaya Pendidikan</td>
                <td>:</td>
                <td class="harga">{{ $detail_kursus->jumlah }}</td>
            </tr>
            <tr>
                <td>Telah Dibayar Sebesar</td>
                <td>:</td>
                <td class="harga">{{ $telah_dibayar }}</td>
            </tr>
            <tr>
                <td>Sisa Pembayaran</td>
                <td>:</td>
                <td class="harga">{{ $sisa_pembayaran }}</td>
            </tr>
			@foreach($detail_pembayaran as $pembayaran)
            <tr>
                <td>Pembayaran Ke-{{ $pembayaran->pembayaran_ke }}</td>
                <td>:</td>
                <td class="harga">{{ $pembayaran->bayar }}</td>
            </tr>
			@endforeach
        </tbody>
    </table>
</body>

</html>

<script src="{{ asset('assets/js/autonumeric@4.1.0.js') }}"></script>
<script>
    new AutoNumeric.multiple('.harga',{
        allowDecimalPadding: false,
        decimalCharacter: ",",
        digitGroupSeparator: ".",
        currencySymbol: "Rp "
    });
</script>

<script>
    window.print();
	window.onafterprint = function(){
		window.close();
	}
</script>
