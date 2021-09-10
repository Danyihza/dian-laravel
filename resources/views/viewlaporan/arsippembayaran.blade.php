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
            @include('notification')
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
                            @foreach($siswa as $s)
                            <tr>
                                <td class="text-center">
                                    <span class="font-medium">
                                        {{$loop->iteration}}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <span class="font-medium">{{ $s->hasSiswa->nis }}</span>
                                </td>
                                <td class="text-center">
                                    <span class="font-medium">{{ $s->hasSiswa->nama }}</span>
                                </td>
                                <td class="text-center">
                                    <span class="font-medium">{{ $s->hasDetailKursus->kursus != 0 ? $s->hasDetailKursus->hasKursus->nama_kursus : '-' }}</span>
                                </td>
                                <td class="text-center">
                                    <span class="font-medium">{{ $s->hasDetailKursus->program != 0 ? $s->hasDetailKursus->hasProgram->nama_program : '-' }}</span>
                                </td>
                                <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center">
                                        <a class="flex items-center mr-3" href="{{ route('detailArsipPembayaran') }}?s={{ $s->hasSiswa->id_siswa }}&d={{ $s->hasDetailKursus->id_detail }}"> <i
                                                data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit Pembayaran </a>
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
@if($url_print)
<script>
    function htmlDecode(input) {
        var doc = new DOMParser().parseFromString(input, "text/html");
        return doc.documentElement.textContent;
    }
    $(document).ready(function() {
        const url_print = htmlDecode("{{$url_print}}");
        window.open(url_print, '_blank', 'location=yes,height=768,width=1366,scrollbars=yes,status=yes');
    })
</script>
@endif
<script>
$(document).ready(function() {
    $('#pembayaran').DataTable();
})
</script>
@endsection