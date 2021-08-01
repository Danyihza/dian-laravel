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
                            <form action="{{ route('addKaryawan') }}" method="post">
                                @csrf
                                <div>
                                    <label>Nama</label>
                                    <input type="text" class="input w-full border mt-2" name="nama" placeholder="Masukkan Nama Karyawan">
                                </div>
                                <div class="mt-3">
                                    <label>Jabatan</label>
                                    <select name="jabatan" class="tail-select w-full">
                                        <option value="0" selected>Pilih Jabatan</option>
                                        @foreach ($jabatan as $jbt)
                                            <option value="{{ $jbt->id_jabatan }}">{{ $jbt->jenis_jabatan }}</option>
                                        @endforeach
                                    </select> 
                                </div>
                                <div class="mt-3">
                                    <label>No Telepon</label>
                                    <input type="text" class="input w-full border mt-2" name="no_telepon" placeholder="Masukkan No Telepon Karyawan">
                                </div>
                                <div class="mt-3">
                                    <label>Cabang</label>
                                    <select name="cabang" class="tail-select w-full">
                                        <option value="0" selected>Pilih Cabang</option>
                                        @foreach ($cabang as $cbg)
                                            <option value="{{ $cbg->id_cabang }}">{{ $cbg->alamat }} - {{ $cbg->kota }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="text-right mt-5">
                                    <button type="submit" class="button w-36 bg-theme-1 text-white">Tambah Karyawan</button>
                                </div>
                            </form>
                        </div>
                        <!-- END: Form Layout -->
                    </div>
                    <table id="pembayaran" class="table table-report mt-2">
                        <thead>
                            <tr>
                                <th class="text-center whitespace-no-wrap">NO</th>
                                <th class="text-center whitespace-no-wrap">NAMA</th>
                                <th class="text-center whitespace-no-wrap">JABATAN</th>
                                <th class="text-center whitespace-no-wrap">NOMOR TELEPON</th>
                                <th class="text-center whitespace-no-wrap">CABANG</th>
                                <th class="text-center whitespace-no-wrap">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($karyawan as $kry)
                            <tr>
                                <td class="text-center">
                                    <span class="font-medium">
                                        {{$kry->id_karyawan}}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <span class="font-medium">
                                        {{$kry->nama}}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <span class="font-medium">
                                        {{$kry->hasJabatan->jenis_jabatan}}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <span class="font-medium">
                                        {{$kry->no_telepon}}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <span class="font-medium">
                                        {{$kry->hasCabang->alamat}} - {{$kry->hasCabang->kota}}
                                    </span>
                                </td>
                                <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center">
                                        <a class="flex items-center mr-3" href="{{ route('showKaryawan', $kry->id_karyawan) }}"> <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                        <a class="flex items-center text-theme-6" href="{{ route('removeKaryawan', $kry->id_karyawan) }}" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')" data-toggle="modal" data-target="#delete-confirmation-modal"> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
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