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
            @include('notification')
            {{-- <h2 class="text-lg font-medium mt-10">
                {{ ucwords($parent) . ' - ' . ucwords($title) }}
            </h2> --}}
            <div class="grid grid-cols-12 gap-6 mt-5">
                <div class="col-span-12 overflow-auto lg:overflow-visible">
                    <div class="intro-y col-span-12 lg:col-span-6">
                        <!-- BEGIN: Form Layout -->
                        <div class="intro-y box p-5 mb-5">
                            <form action="{{ route('addPengeluaran') }}" method="post">
                                @csrf
                                <div>
                                    <label>Tanggal Transaksi</label>
                                    <input class="mt-2 datepicker input w-full border block" name="tanggal" data-single-mode="true">
                                </div>
                                <div class="mt-3">
                                    <label>Rincian</label>
                                    <input type="text" class="input w-full border mt-2" name="rincian" placeholder="Masukkan Rincian">
                                </div>
                                <div class="mt-3">
                                    <label>Biaya</label>
                                    <input type="text" class="input w-full border mt-2" name="biaya" placeholder="Masukkan Biaya">
                                </div>
                                <div class="text-right mt-5">
                                    <button type="submit" class="button w-24 bg-theme-1 text-white">Tambah</button>
                                </div>
                            </form>
                        </div>
                        <!-- END: Form Layout -->
                    </div>
                    <table id="pembayaran" class="table table-report mt-2">
                        <thead>
                            <tr>
                                <th class="text-center whitespace-no-wrap">TANGGAL TRANSAKSI</th>
                                <th class="text-center whitespace-no-wrap">RINCIAN</th>
                                <th class="text-center whitespace-no-wrap">BESAR PENGELUARAN</th>
                                <th class="text-center whitespace-no-wrap">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pengeluaran as $pngl)
                            <tr>
                                <td class="text-center">
                                    <span class="font-medium">
                                        {{date('d/m/Y', strtotime($pngl->tanggal))}}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <span class="font-medium">
                                        {{$pngl->rincian}}
                                    </span>
                                </td>
                                <td class="text-center uang">{{ $pngl->biaya }}</td>
                                <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center">
                                        <a class="flex items-center text-theme-6" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')" href="{{ route('removePengeluaran', $pngl->id_pengeluaran) }}"> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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
<script>
$(document).ready(function() {
    $('#pembayaran').DataTable();
})
</script>
@endsection