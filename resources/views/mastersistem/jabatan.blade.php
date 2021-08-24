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
                    <div class="intro-y col-span-12 lg:col-span-6">
                        <!-- BEGIN: Form Layout -->
                        <div class="intro-y box p-5 mb-5">
                            <form action="{{ route('addJabatan') }}" method="post">
                                @csrf
                                <div>
                                    <label>Jenis Jabatan</label>
                                    <input type="text" class="input w-full border mt-2" name="jenis_jabatan" placeholder="Masukkan Jenis Jabatan">
                                </div>
                                <div class="text-right mt-5">
                                    <button type="submit" class="button w-36 bg-theme-1 text-white">Tambah Jabatan</button>
                                </div>
                            </form>
                        </div>
                        <!-- END: Form Layout -->
                    </div>
                    <table id="pembayaran" class="table table-report mt-2">
                        <thead>
                            <tr>
                                <th class="text-center whitespace-no-wrap">NO</th>
                                <th class="text-center whitespace-no-wrap">JENIS JABATAN</th>
                                <th class="text-center whitespace-no-wrap">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($jabatan as $jbt)
                            <tr>
                                <td class="text-center">
                                    <span class="font-medium">
                                        {{$loop->iteration}}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <span class="font-medium">
                                        {{$jbt->jenis_jabatan}}
                                    </span>
                                </td>
                                <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center">
                                        <a href="javascript:;" data-toggle="modal" data-target="#modalEdit{{ $jbt->id_jabatan }}" class="flex items-center text-theme-7" > <i data-feather="edit" class="w-4 h-4 mr-1"></i> Edit </a>
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

@foreach($jabatan as $jbt)
<div class="modal" id="modalEdit{{ $jbt->id_jabatan }}">
    <div class="modal__content">
        <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">Edit Jabatan</h2>
        </div>
        <div class="p-5 ">
            <form action="{{ route('editJabatan') }}" method="post">
                @csrf
                <input type="hidden" name="id_jabatan" value="{{ $jbt->id_jabatan }}">
                <div>
                    <label>Jenis Jabatan</label>
                    <input type="text" class="input w-full border mt-2" name="jenis_jabatan" value="{{ $jbt->jenis_jabatan }}" placeholder="Masukkan Nama Jabatan">
                </div>
        </div>
        <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5"> <button type="button" data-dismiss="modal"
                class="button w-20 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1">Batal</button>
            <button type="submit" class="button w-20 bg-theme-1 text-white">Simpan</button> </div>
        </form>
    </div>
</div>
@endforeach
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.colVis.min.js"></script>
<script>
$(document).ready(function() {
    $('#pembayaran').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'excel', 'pdf', {
                extend: 'print',
                exportOptions: {
                    columns: ':visible'
                }
            }, 'colvis'
        ]
    });
})
</script>
@endsection