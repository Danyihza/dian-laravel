<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nota Pembayaran</title>    <style>
        table {
            border-collapse: collapse;
            border-spacing: 0;
        }

        table {
            width: 100%;
            height: 100%;
            border: 1px solid black;
        }

        body{
            zoom: 65%;
        }
        
        @page {
            size: A5 landscape;
            margin: 1rem;
        }

    </style>
</head>

<body>
    <table class="tg" style="table-layout: fixed; width: 50px">
        <colgroup>
            <col style="width: 101px">
            <col style="width: 146px">
            <col style="width: 21px">
            <col style="width: 142px">
            <col style="width: 149px">
            <col style="width: 22px">
            <col style="width: 183px">
            <col style="width: 146px">
            <col style="width: 22px">
            <col style="width: 109px">
        </colgroup>
        <tbody>
            <tr>
                <td align="center" style="border-bottom: 1px solid black;" class="tg-de2y" rowspan="3">
                    <img src="{{ asset('assets') }}/images/dian-logo.png" width="50px" alt="">
                </td>
                <td align="center" style="border-right: 1px solid black; border-bottom: 1px solid black;" class="tg-ted4" colspan="3" rowspan="3"><span
                        style="font-weight:bold">DIAN
                        INSTITUTE</span><br>PUSDIKLAT DAN LATIHAN KERJA</td>
                <td align="center" class="tg-ted4" colspan="3" rowspan="2" style="border-right: 1px solid black;">Cabang : Jl. Raya Manukan Kulon 36</td>
                <td align="center" class="tg-ted4" colspan="3" rowspan="3" style="border-bottom: 1px solid black;"><span style="font-weight:bold; border: 1px solid black; padding: 0.5rem;">Untuk Siswa</span></td>
            </tr>
            <tr>
            </tr>
            <tr>
                <td class="tg-uzvj" align="center" style="border-bottom: 1px solid black;border-right: 1px solid black;" colspan="3"><b>Bukti Pembayaran dan Pendaftaran</b></td>
            </tr>
            <tr>
                <td class="tg-0pky"></td>
                <td class="tg-0pky"></td>
                <td class="tg-lboi"></td>
                <td class="tg-0pky"></td>
                <td class="tg-0pky"></td>
                <td class="tg-0pky"></td>
                <td class="tg-0pky"></td>
                <td class="tg-c3ow"></td>
            </tr>
            <tr>
                <td class="tg-0pky" rowspan="8"></td>
                <td class="tg-0pky">No. Transaksi</td>
                <td class="tg-lboi">:</td>
                <td class="tg-0pky">{{ $no_transaksi }}</td>
                <td class="tg-0pky">Kelas</td>
                <td class="tg-0pky">:</td>
                <td class="tg-0pky"></td>
                <td class="tg-c3ow" align="center" colspan="3" rowspan="2"><span style="font-weight:bold">Untuk Pembayaran</span></td>
            </tr>
            <tr>
                <td class="tg-0pky">NIS</td>
                <td class="tg-0pky">:</td>
                <td class="tg-0pky">{{$siswa->nis}}</td>
                <td class="tg-0pky">Sistem Kursus</td>
                <td class="tg-0pky">:</td>
                <td class="tg-0pky"></td>
            </tr>
            <tr>
                <td class="tg-0pky">Nama Siswa</td>
                <td class="tg-0pky">:</td>
                <td class="tg-0pky">{{ $siswa->nama }}</td>
                <td class="tg-0pky">Hari Kursus</td>
                <td class="tg-0pky">:</td>
                <td class="tg-0pky">{{ $detail_kursus->hari_kursus }}</td>
                <td class="tg-0pky">Uang Daftar</td>
                <td class="tg-0pky">:</td>
                <td class="tg-0pky harga">{{ $detail_kursus->uang_pendaftaran }}</td>
            </tr>
            <tr>
                <td class="tg-0pky">Kursus</td>
                <td class="tg-0pky">:</td>
                <td class="tg-0pky">{{ $detail_kursus->hasKursus->nama_kursus}}</td>
                <td class="tg-0pky"></td>
                <td class="tg-0pky"></td>
                <td class="tg-0pky"></td>
                <td class="tg-0pky">Uang Kursus</td>
                <td class="tg-0pky">:</td>
                <td class="tg-0pky harga">{{ $detail_kursus->uang_kursus }}</td>
            </tr>
            <tr>
                <td class="tg-0pky">Program</td>
                <td class="tg-0pky">:</td>
                <td class="tg-0pky">{{ $detail_kursus->hasProgram->nama_program }}</td>
                <td class="tg-0pky"></td>
                <td class="tg-0pky"></td>
                <td class="tg-0pky"></td>
                <td class="tg-0pky">Uang Ujian</td>
                <td class="tg-0pky">:</td>
                <td class="tg-0pky harga">{{ $detail_kursus->uang_ujian_sertifikat }}</td>
            </tr>
            <tr>
                <td class="tg-0pky">Level</td>
                <td class="tg-0pky">:</td>
                <td class="tg-0pky">{{ $detail_kursus->hasLevel->nama_level }}</td>
                <td class="tg-0pky">Jam Kursus</td>
                <td class="tg-0pky">:</td>
                <td class="tg-0pky">{{ $detail_kursus->jam_kursus }}</td>
                <td class="tg-0pky">Uang Buku</td>
                <td class="tg-0pky">:</td>
                <td class="tg-0pky harga">{{ $detail_kursus->uang_buku}}</td>
            </tr>
            <tr>
                <td class="tg-0pky"></td>
                <td class="tg-0pky"></td>
                <td class="tg-0pky"></td>
                <td class="tg-0pky">Besar Bayar</td>
                <td class="tg-0pky">:</td>
                <td class="tg-0pky harga">{{$jumlah_bayar}}</td>
                <td class="tg-0pky">Uang Peralatan</td>
                <td class="tg-0pky">:</td>
                <td class="tg-0pky harga">{{ $detail_kursus->uang_peralatan ? $detail_kursus->uang_peralatan : '-' }}</td>
            </tr>
            <tr>
                <td class="tg-0pky"></td>
                <td class="tg-0pky"></td>
                <td class="tg-0pky"></td>
                <td class="tg-0pky"></td>
                <td class="tg-0pky"></td>
                <td class="tg-0pky"></td>
                <td class="tg-0pky">Sisa Pembayaran</td>
                <td class="tg-0pky">:</td>
                <td class="tg-0pky harga">{{ $sisa_pembayaran }}</td>
            </tr>
            <tr>
                <td class="tg-0pky" colspan="2" style="border-top: 1px solid black; border-right: 1px solid black;" rowspan="7"></td>
                <td class="tg-wp8o" align="center" colspan="4" style="border-top: 1px solid black; border-right: 1px solid black;">Tanda Tangan Siswa,</td>
                <td class="tg-c3ow" align="center" colspan="4" style="border-top: 1px solid black;">{{ $cabang->kota }}, {{ $tanggalTransaksi }}</td>
            </tr>
            <tr>
                <td class="tg-0pky" colspan="4" rowspan="5" style="height: 100px; border-right: 1px solid black;"></td>
                <td class="tg-c3ow" align="center" colspan="4">Tanda Tangan Penerima,</td>
            </tr>
            <tr>
                <td class="tg-0pky" colspan="4" rowspan="4"></td>
            </tr>
            <tr>
            </tr>
            <tr>
            </tr>
            <tr>
            </tr>
            <tr>
                <td class="tg-c3ow" align="center" colspan="4" style="border-right: 1px solid black;">{{ $siswa->nama}}</td>
                <td class="tg-c3ow" align="center" colspan="4">{{ session('login-data')['nama'] }}</td>
            </tr>
        </tbody>
    </table>
    <br><br>

    <table class="tg" style="undefined;table-layout: fixed; width: 50px">
        <colgroup>
            <col style="width: 101px">
            <col style="width: 146px">
            <col style="width: 21px">
            <col style="width: 142px">
            <col style="width: 149px">
            <col style="width: 22px">
            <col style="width: 183px">
            <col style="width: 146px">
            <col style="width: 22px">
            <col style="width: 109px">
        </colgroup>
        <tbody>
            <tr>
                <td align="center" style="border-bottom: 1px solid black;" class="tg-de2y" rowspan="3">
                    <img src="{{ asset('assets') }}/images/dian-logo.png" width="50px" alt="">
                </td>
                <td align="center" style="border-right: 1px solid black; border-bottom: 1px solid black;" class="tg-ted4" colspan="3" rowspan="3"><span
                        style="font-weight:bold">DIAN
                        INSTITUTE</span><br>PUSDIKLAT DAN LATIHAN KERJA</td>
                <td align="center" class="tg-ted4" colspan="3" rowspan="2" style="border-right: 1px solid black;">Cabang : Jl. Raya Manukan Kulon 36</td>
                <td align="center" class="tg-ted4" colspan="3" rowspan="3" style="border-bottom: 1px solid black;"><span style="font-weight:bold; border: 1px solid black; padding: 0.5rem;">Untuk Petugas</span></td>
            </tr>
            <tr>
            </tr>
            <tr>
                <td class="tg-uzvj" align="center" style="border-bottom: 1px solid black;border-right: 1px solid black;" colspan="3"><b>Bukti Pembayaran dan Pendaftaran</b></td>
            </tr>
            <tr>
                <td class="tg-0pky"></td>
                <td class="tg-0pky"></td>
                <td class="tg-lboi"></td>
                <td class="tg-0pky"></td>
                <td class="tg-0pky"></td>
                <td class="tg-0pky"></td>
                <td class="tg-0pky"></td>
                <td class="tg-c3ow"></td>
            </tr>
            <tr>
                <td class="tg-0pky" rowspan="8"></td>
                <td class="tg-0pky">No. Transaksi</td>
                <td class="tg-lboi">:</td>
                <td class="tg-0pky">{{ $no_transaksi }}</td>
                <td class="tg-0pky">Kelas</td>
                <td class="tg-0pky">:</td>
                <td class="tg-0pky"></td>
                <td class="tg-c3ow" align="center" colspan="3" rowspan="2"><span style="font-weight:bold">Untuk Pembayaran</span></td>
            </tr>
            <tr>
                <td class="tg-0pky">NIS</td>
                <td class="tg-0pky">:</td>
                <td class="tg-0pky">{{$siswa->nis}}</td>
                <td class="tg-0pky">Sistem Kursus</td>
                <td class="tg-0pky">:</td>
                <td class="tg-0pky"></td>
            </tr>
            <tr>
                <td class="tg-0pky">Nama Siswa</td>
                <td class="tg-0pky">:</td>
                <td class="tg-0pky">{{ $siswa->nama }}</td>
                <td class="tg-0pky">Hari Kursus</td>
                <td class="tg-0pky">:</td>
                <td class="tg-0pky">{{ $detail_kursus->hari_kursus }}</td>
                <td class="tg-0pky">Uang Daftar</td>
                <td class="tg-0pky">:</td>
                <td class="tg-0pky harga">{{ $detail_kursus->uang_pendaftaran }}</td>
            </tr>
            <tr>
                <td class="tg-0pky">Kursus</td>
                <td class="tg-0pky">:</td>
                <td class="tg-0pky">{{ $detail_kursus->hasKursus->nama_kursus}}</td>
                <td class="tg-0pky"></td>
                <td class="tg-0pky"></td>
                <td class="tg-0pky"></td>
                <td class="tg-0pky">Uang Kursus</td>
                <td class="tg-0pky">:</td>
                <td class="tg-0pky harga">{{ $detail_kursus->uang_kursus }}</td>
            </tr>
            <tr>
                <td class="tg-0pky">Program</td>
                <td class="tg-0pky">:</td>
                <td class="tg-0pky">{{ $detail_kursus->hasProgram->nama_program }}</td>
                <td class="tg-0pky"></td>
                <td class="tg-0pky"></td>
                <td class="tg-0pky"></td>
                <td class="tg-0pky">Uang Ujian</td>
                <td class="tg-0pky">:</td>
                <td class="tg-0pky harga">{{ $detail_kursus->uang_ujian_sertifikat }}</td>
            </tr>
            <tr>
                <td class="tg-0pky">Level</td>
                <td class="tg-0pky">:</td>
                <td class="tg-0pky">{{ $detail_kursus->hasLevel->nama_level }}</td>
                <td class="tg-0pky">Jam Kursus</td>
                <td class="tg-0pky">:</td>
                <td class="tg-0pky">{{ $detail_kursus->jam_kursus }}</td>
                <td class="tg-0pky">Uang Buku</td>
                <td class="tg-0pky">:</td>
                <td class="tg-0pky harga">{{ $detail_kursus->uang_buku}}</td>
            </tr>
            <tr>
                <td class="tg-0pky"></td>
                <td class="tg-0pky"></td>
                <td class="tg-0pky"></td>
                <td class="tg-0pky">Besar Bayar</td>
                <td class="tg-0pky">:</td>
                <td class="tg-0pky harga">{{$jumlah_bayar}}</td>
                <td class="tg-0pky">Uang Peralatan</td>
                <td class="tg-0pky">:</td>
                <td class="tg-0pky harga">{{ $detail_kursus->uang_peralatan ? $detail_kursus->uang_peralatan : '-' }}</td>
            </tr>
            <tr>
                <td class="tg-0pky"></td>
                <td class="tg-0pky"></td>
                <td class="tg-0pky"></td>
                <td class="tg-0pky"></td>
                <td class="tg-0pky"></td>
                <td class="tg-0pky"></td>
                <td class="tg-0pky">Sisa Pembayaran</td>
                <td class="tg-0pky">:</td>
                <td class="tg-0pky harga">{{ $sisa_pembayaran }}</td>
            </tr>
            <tr>
                <td class="tg-0pky" colspan="2" style="border-top: 1px solid black; border-right: 1px solid black;" rowspan="7"></td>
                <td class="tg-wp8o" align="center" colspan="4" style="border-top: 1px solid black; border-right: 1px solid black;">Tanda Tangan Siswa,</td>
                <td class="tg-c3ow" align="center" colspan="4" style="border-top: 1px solid black;">{{ $cabang->kota }}, {{ $tanggalTransaksi }}</td>
            </tr>
            <tr>
                <td class="tg-0pky" colspan="4" rowspan="5" style="height: 100px; border-right: 1px solid black;"></td>
                <td class="tg-c3ow" align="center" colspan="4">Tanda Tangan Penerima,</td>
            </tr>
            <tr>
                <td class="tg-0pky" colspan="4" rowspan="4"></td>
            </tr>
            <tr>
            </tr>
            <tr>
            </tr>
            <tr>
            </tr>
            <tr>
                <td class="tg-c3ow" align="center" colspan="4" style="border-right: 1px solid black;">{{ $siswa->nama}}</td>
                <td class="tg-c3ow" align="center" colspan="4">{{ session('login-data')['nama'] }}</td>
            </tr>
        </tbody>
    </table>
</body>

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
</script>



</html>
