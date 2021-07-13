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
                    <div class="flex justify-end my-5 sm:mt-0">
                        <a href="{{ route('pendaftaranView') }}?redirect_to={{ urlencode(route('arsipSiswaView')) }}"
                            class="button w-1/2 sm:w-auto flex items-center border text-gray-700 mr-2 dark:bg-dark-5 dark:text-gray-300"
                            id="tabulator-print"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus mx-auto"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg> Tambah 
                        </a>
                        <div class="dropdown w-1/2 sm:w-auto" style="position: relative;">
                            <button
                                class="dropdown-toggle button w-full sm:w-auto flex items-center border text-gray-700 dark:bg-dark-5 dark:text-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-file-text w-4 h-4 mr-2">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                    <polyline points="14 2 14 8 20 8"></polyline>
                                    <line x1="16" y1="13" x2="8" y2="13"></line>
                                    <line x1="16" y1="17" x2="8" y2="17"></line>
                                    <polyline points="10 9 9 9 8 9"></polyline>
                                </svg> Export <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-chevron-down w-4 h-4 ml-auto sm:ml-2">
                                    <polyline points="6 9 12 15 18 9"></polyline>
                                </svg> </button>
                            <div class="dropdown-box w-40" id="_votzptxl8" data-popper-placement="bottom-end"
                                style="position: absolute; inset: 0px auto auto 0px; transform: translate(-45px, 39px);">
                                <div class="dropdown-box__content box dark:bg-dark-1 p-2">
                                    <a href="javascript:;"
                                        class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"
                                        id="tabulator-export-xlsx"> <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-file-text w-4 h-4 mr-2">
                                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                            <polyline points="14 2 14 8 20 8"></polyline>
                                            <line x1="16" y1="13" x2="8" y2="13"></line>
                                            <line x1="16" y1="17" x2="8" y2="17"></line>
                                            <polyline points="10 9 9 9 8 9"></polyline>
                                        </svg> Export XLSX </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table id="pembayaran" class="table table-report mt-2">
                        <thead>
                            <tr>
                                <th class="text-center whitespace-no-wrap">NO</th>
                                <th class="text-center whitespace-no-wrap">NIS</th>
                                <th class="text-center whitespace-no-wrap">NAMA</th>
                                <th class="text-center whitespace-no-wrap">KURSUS</th>
                                <th class="text-center whitespace-no-wrap">PROGRAM</th>
                                <th class="text-center whitespace-no-wrap">AKSI</th>
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
                                        <a class="flex items-center mr-3" href="{{ route('detailSiswa') }}?s={{ $s->hasSiswa->id_siswa }}&d={{ $s->hasDetailKursus->id_detail }}"> <i
                                                data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                        <a class="flex items-center text-theme-6" href="javascript:;"
                                            data-toggle="modal" data-target="#delete-confirmation-modal"> <i
                                                data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
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
    $(document).ready(function () {
        $('#pembayaran').DataTable();
    })

</script>
@endsection
