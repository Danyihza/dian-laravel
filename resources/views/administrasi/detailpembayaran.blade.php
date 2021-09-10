@extends('template')
@section('title', ucwords($title))
@section('body')

<body class="app">
    @include('sidebar.mobile')
    <div class="flex">
        @include('sidebar.desktop')
        <!-- BEGIN: Content -->
        <div class="content">
            @include('topbar.topbar')
            <div class="grid grid-cols-12 gap-6 mt-5">
                <div class="col-span-12 overflow-auto lg:overflow-visible">
                        <div class="grid grid-cols-12 gap-8 mt-5">
                            <div class="intro-y col-span-12 lg:col-span-6">
                                <!-- BEGIN: Form Layout -->
                                <div class="intro-y box p-5">
                                    <table>
                                        <tr>
                                            <td class="w-56">
                                                NIS
                                            </td>
                                            <td class="w-2">
                                                :
                                            </td>
                                            <td class="font-medium">
                                                {{$siswa->nis}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-56">
                                                Nama
                                            </td>
                                            <td class="w-2">
                                                :
                                            </td>
                                            <td class="font-medium">
                                                {{$siswa->nama}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-56">
                                                Kursus
                                            </td>
                                            <td class="w-2">
                                                :
                                            </td>
                                            <td class="font-medium">
                                                {{$detail_kursus->kursus != 0 ? $detail_kursus->hasKursus->nama_kursus : '-'}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-56">
                                                Program
                                            </td>
                                            <td class="w-2">
                                                :
                                            </td>
                                            <td class="font-medium">
                                                {{$detail_kursus->program != 0 ? $detail_kursus->hasProgram->nama_program : '-'}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-56">
                                                Level
                                            </td>
                                            <td class="w-2">
                                                :
                                            </td>
                                            <td class="font-medium">
                                                {{$detail_kursus->level != 0 ? $detail_kursus->hasLevel->nama_level : '-'}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-56">
                                                Pendidikan
                                            </td>
                                            <td class="w-2">
                                                :
                                            </td>
                                            <td class="font-medium">
                                                {{$siswa->pendidikan}}
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <!-- END: Form Layout -->
                            </div>
                            <div class="intro-y col-span-12 lg:col-span-6">
                                <!-- BEGIN: Form Layout -->
                                <div class="intro-y box p-5">
                                    <table>
                                        <tr>
                                            <td class="w-56">
                                                Uang Pendaftaran
                                            </td>
                                            <td class="w-2">
                                                :
                                            </td>
                                            <td class="font-medium uang">
                                                {{ $detail_kursus->uang_pendaftaran }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-56">
                                                Uang Kursus
                                            </td>
                                            <td class="w-2">
                                                :
                                            </td>
                                            <td class="font-medium uang">
                                                {{$detail_kursus->uang_kursus}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-56">
                                                Uang Ujian & Sertifikat
                                            </td>
                                            <td class="w-2">
                                                :
                                            </td>
                                            <td class="font-medium uang">
                                                {{$detail_kursus->uang_ujian_sertifikat}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-56">
                                                Uang Buku
                                            </td>
                                            <td class="w-2">
                                                :
                                            </td>
                                            <td class="font-medium uang">
                                                {{$detail_kursus->uang_buku}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-56">
                                                Uang Peralatan
                                            </td>
                                            <td class="w-2">
                                                :
                                            </td>
                                            <td class="font-medium uang">
                                                {{$detail_kursus->uang_peralatan}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-56">
                                                Total Biaya Pendidikan
                                            </td>
                                            <td class="w-2">
                                                :
                                            </td>
                                            <td class="font-medium uang">
                                                {{$detail_kursus->jumlah}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-56">
                                                Telah Dibayar Sebesar
                                            </td>
                                            <td class="w-2">
                                                :
                                            </td>
                                            <td class="font-medium uang">
                                                {{$telah_dibayar}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-56">
                                                Sisa Pembayaran
                                            </td>
                                            <td class="w-2">
                                                :
                                            </td>
                                            <td class="font-medium uang">
                                                {{ $sisa_pembayaran }}
                                            </td>
                                        </tr>
                                        @foreach($detail_pembayaran as $pemb)
                                        <tr>
                                            <td class="w-56">
                                                Pembayaran Ke-{{ $pemb->pembayaran_ke }}
                                            </td>
                                            <td class="w-2">
                                                :
                                            </td>
                                            <td class="font-medium uang">
                                                {{ $pemb->bayar }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </table>
                                    @php
                                    if (count($detail_pembayaran)>0) {
                                        $array = $detail_pembayaran->toArray();
                                        $dp = end($array)['pembayaran_ke'];
                                        $ke = $dp + 1;
                                    }
                                    @endphp
                                    <form action="{{ route('bayarPendidikan') }}" method="post" onsubmit="print()">
                                        @csrf
                                        <input type="hidden" id="id_siswa" name="id_siswa" value="{{$siswa->id_siswa}}">
                                        <input type="hidden" id="id_detail_kursus" name="id_detail_kursus" value="{{$detail_kursus->id_detail}}">
                                        <input type="hidden" id="url_print" name="url_print">
                                        <hr class="mt-5">
                                        <div class="mt-5">
                                            <h1 class="text-xl font-bold">Untuk Pembayaran Ke-{{ $ke ?? 1 }}</h1>
                                        </div>
                                        <div class="mt-5">
                                            <label class="flex flex-col sm:flex-row">Tanggal Pembayaran</label>
                                            <input class="mt-2 datepicker input w-full border block" name="tanggal_pembayaran" id="tanggal_pembayaran" data-single-mode="true" required>
                                        </div>
                                        <div class="mt-3">
                                            <label class="flex flex-col sm:flex-row">Dibayar Sebesar</label>
                                            <input type="text" class="input w-full border mt-2" id="jumlah" name="dibayar" placeholder="Masukkan Besar Pembayaran" autocomplete="off" required>
                                            <span class="text-xs text-indigo-50">Pastikan pembayaran lebih kecil sama dengan dari sisa pembayaran</span>
                                        </div>
                                        <div class="mt-3">
                                            <label class="flex flex-col sm:flex-row"> 
                                                Keterangan
                                            </label> 
                                            <textarea class="input w-full border mt-2" name="keterangan" placeholder="Masukkan Keterangan Pembayaran" rows="5" required></textarea>
                                        </div>
                                        <div class="text-right mt-5">
                                            <button type="button" onclick="location.href = '{{ route('pembayaranView') }}'" class="button w-24 border dark:border-dark-5 text-gray-700 dark:text-gray-300 mr-1">Cancel</button>
                                            <button type="submit" class="button w-24 bg-theme-1 text-white">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- END: Form Layout -->
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <!-- END: Content -->
    </div>
</body>
@endsection

@section('script')
<script src="{{ asset('assets/js/autonumeric@4.1.0.js') }}"></script>
<script>
    new AutoNumeric.multiple('.uang',{
        allowDecimalPadding: false,
        decimalCharacter: ",",
        digitGroupSeparator: '.',
        minimumValue: "0",
        currencySymbol: "Rp ",
    });

    new AutoNumeric('#jumlah', {
        maximumValue: "{{ $sisa_pembayaran }}",
        minimumValue: "0",
        allowDecimalPadding: false,
        decimalCharacter: ",",
        digitGroupSeparator: '',
        unformatOnSubmit: true
    })
</script>
<script>
    function print(){
        const confirm = window.confirm('Apakah anda ingin mencetak nota pembayaran ?');
        if (confirm) {
            console.log('print');
            const id_siswa = document.getElementById('id_siswa').value;
            const id_detail_kursus = document.getElementById('id_detail_kursus').value;
            const tanggal = document.getElementById('tanggal_pembayaran').value;
            const jumlah = document.getElementById('jumlah').value;
            // window.open(`{{ route('prinNotaPembayaran') }}?s=${id_siswa}&d=${id_detail_kursus}&j=${jumlah}&t=${tanggal}`, '_blank', 'location=yes,height=768,width=1366,scrollbars=yes,status=yes');
            const url_print = `{{ route('prinNotaPembayaran') }}?s=${id_siswa}&d=${id_detail_kursus}&j=${jumlah}&t=${tanggal}`;
            document.querySelector('#url_print').value = url_print;
            // return true;
        }else{
            document.querySelector('#url_print').value = null;
            return true;
        }
    }

</script>
@endsection