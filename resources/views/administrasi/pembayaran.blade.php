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
                                <th class="text-center whitespace-no-wrap">NIS</th>
                                <th class="text-center whitespace-no-wrap">NAMA</th>
                                <th class="text-center whitespace-no-wrap">KURSUS</th>
                                <th class="text-center whitespace-no-wrap">PROGRAM</th>
                                <th class="text-center whitespace-no-wrap">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pembayaran as $bayar)
                            <tr>
                                <td class="text-center">
                                    {{$loop->iteration}}
                                </td>
                                <td class="text-center">{{ $bayar->hasSiswa->nis }}</td>
                                <td class="text-center">
                                    <span class="font-medium whitespace-no-wrap">{{ $bayar->hasSiswa->nama }}</span> 
                                </td>
                                <td class="text-center">
                                    <span class="font-medium">{{ $bayar->hasDetailKursus->kursus != 0 ? $bayar->hasDetailKursus->hasKursus->nama_kursus : '-' }}</span>
                                </td>
                                <td class="text-center">
                                    <span class="font-medium">{{ $bayar->hasDetailKursus->program != 0 ? $bayar->hasDetailKursus->hasProgram->nama_program : '-' }}</span>
                                </td>
                                <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center">
                                        <a class="flex items-center text-theme-1" href="{{ route('detailPembayaranView', ['id_siswa' => $bayar->hasSiswa->id_siswa, 'id_detail_kursus' => $bayar->hasDetailKursus->id_detail]) }}"> <i data-feather="dollar-sign" class="w-4 h-4 mr-1"></i> Pembayaran </a>
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
<script>
$(document).ready(function() {
    $('#pembayaran').DataTable();
})
</script>
@endsection