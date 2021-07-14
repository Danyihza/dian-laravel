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
                <div class="col-span-12 overflow-auto lg:overflow-visible inline-block align-middle">
                    <div class="p-48 text-center">
                        <form action="{{route('laporanPeriodeDetail')}}" method="get">
                            <label class="font-medium text-xl">Laporan Per Periode</label>
                            <div class="">
                                <div class="relative w-56 mx-auto my-3">
                                    <div class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600 dark:bg-dark-1 dark:border-dark-4"> 
                                        <i data-feather="calendar" class="w-4 h-4"></i> 
                                    </div> 
                                    <input type="text" class="datepicker input pl-12 border" name="tanggal_dari" data-single-mode="true">
                                </div>
                                <span>s/d</span>
                                <div class="relative w-56 mx-auto my-3">
                                    <div class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600 dark:bg-dark-1 dark:border-dark-4"> 
                                        <i data-feather="calendar" class="w-4 h-4"></i> 
                                    </div> 
                                    <input type="text" class="datepicker input pl-12 border" name="tanggal_sampai" data-single-mode="true">
                                </div>
                            </div>
                            <button type="submit" class="button w-24 bg-theme-1 text-white">Lihat</button>
                        </form>
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