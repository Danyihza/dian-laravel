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
                    <div class="intro-y col-span-12 lg:col-span-6">
                        <!-- BEGIN: Form Layout -->
                        <div class="intro-y box p-5 mb-5">
                            <form action="{{ route('addCabang') }}" method="post">
                                @csrf
                                <div>
                                    <label>Kota</label>
                                    <input type="text" class="input w-full border mt-2" name="kota" placeholder="Masukkan Kota Cabang">
                                </div>
                                <div class="mt-3">
                                    <label>Alamat Cabang</label>
                                    <input type="text" class="input w-full border mt-2" name="alamat" placeholder="Masukkan Alamat Cabang">
                                </div>
                                <div class="text-right mt-5">
                                    <button type="submit" class="button w-36 bg-theme-1 text-white">Tambah Cabang</button>
                                </div>
                            </form>
                        </div>
                        <!-- END: Form Layout -->
                    </div>
                    <table id="pembayaran" class="table table-report mt-2">
                        <thead>
                            <tr>
                                <th class="text-center whitespace-no-wrap">NO</th>
                                <th class="text-center whitespace-no-wrap">KOTA</th>
                                <th class="text-center whitespace-no-wrap">ALAMAT CABANG</th>
                                <th class="text-center whitespace-no-wrap">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cabang as $cbg)
                            <tr>
                                <td class="text-center">
                                    <span class="font-medium">
                                        {{ $loop->iteration }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <span class="font-medium">
                                        {{ $cbg->kota }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <span class="font-medium">
                                        {{ $cbg->alamat }}
                                    </span>
                                </td>
                                <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center">
                                        <a class="flex items-center text-theme-6" href="javascript:;" data-toggle="modal" data-target="#delete-confirmation-modal"> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
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