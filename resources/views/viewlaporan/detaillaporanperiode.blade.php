@extends('template')
@section('title', 'Dashboard')
@section('body')

<body class="app">
    @include('sidebar.mobile')
    <div class="flex">
        @include('sidebar.desktop')
        <!-- BEGIN: Content -->
        <div class="content">
            @include('topbar.topbar')
            {{-- <h2 class="text-lg font-medium mt-10">
                {{ ucwords($parent) . ' - ' . ucwords($title) }}
            </h2> --}}
            <div class="grid grid-cols-12 gap-6 mt-5">
                <div class="col-span-12 overflow-auto lg:overflow-visible">
                    <table id="pembayaran" class="table table-report mt-2">
                        <thead>
                            <tr>
                                <th class="text-center whitespace-no-wrap">NO</th>
                                <th class="text-center whitespace-no-wrap">TANGGAL</th>
                                <th class="text-center whitespace-no-wrap">KETERANGAN</th>
                                <th class="text-center whitespace-no-wrap">PEMASUKAN</th>
                                <th class="text-center whitespace-no-wrap">PENGELUARAN</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transaksi as $trans)
                            <tr>
                                <td class="text-center">
                                    <span class="font-medium">
                                        {{$loop->iteration}}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <span class="font-medium">{{ date('d/m/Y', strtotime($trans->tanggal)) }}</span>
                                </td>
                                <td class="text-center">
                                    <span class="font-medium">{{ $trans->keterangan }}</span>
                                </td>
                                <td class="text-center">
                                    <span class="font-medium">{{ $trans->jenis_transaksi == 'Pemasukan' ? $trans->jumlah : '' }}</span>
                                </td>
                                <td class="text-center">
                                    <span class="font-medium">{{ $trans->jenis_transaksi == 'Pengeluaran' ? $trans->jumlah : '' }}</span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-5">
                        <a href="#" class="button w-24 border dark:border-dark-5 text-gray-700 dark:text-gray-300 mr-1">Cetak</a>
                        <a href="#" class="button w-24 bg-theme-1 text-white">Simpan</a>
                        <a href="{{ route('laporanHarianView') }}" class="button w-24 bg-theme-1 text-white">Kembali</a>
                    </div>
                </div>
            </div>
            <!-- END: General Report -->
        </div>
        <!-- END: Content -->
    </div>
</body>
@endsection

@section('script')
<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/js/datatables.min.js') }}"></script>
<script>
$(document).ready(function() {
    $('#pembayaran').DataTable();
})
</script>
@endsection