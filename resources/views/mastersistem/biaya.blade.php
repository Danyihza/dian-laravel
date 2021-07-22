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
                    <div class="grid grid-cols-12 gap-8 mt-5">
                        <div class="intro-y col-span-12 lg:col-span-6">
                            <!-- BEGIN: Form Layout -->
                            <h2 class="font-bold text-lg mb-5">Uang Pendaftaran</h2>
                            <div class="intro-y box p-5 mb-5">
                                <form action="{{ route('addBiaya', 'pendaftaran') }}" method="post">
                                    @csrf
                                    <div>
                                        <label>Jumlah</label>
                                        <input type="text" class="input w-full border mt-2" name="jumlah" placeholder="Masukkan Jumlah">
                                    </div>
                                    <div class="text-right mt-5">
                                        <button type="submit" class="button w-36 bg-theme-1 text-white">Tambah Ke Daftar Biaya</button>
                                    </div>
                                </form>
                            </div>
                            <!-- END: Form Layout -->
                            <table class="table table-report mt-2 data-table">
                                <thead>
                                    <tr>
                                        <th class="text-center whitespace-no-wrap">NO</th>
                                        <th class="text-center whitespace-no-wrap">JUMLAH</th>
                                        <th class="text-center whitespace-no-wrap">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pendaftaran as $pd)
                                    <tr>
                                        <td class="text-center">
                                            <span class="font-medium">
                                                {{ $loop->iteration }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <span class="font-medium">
                                                {{ $pd->jumlah }}
                                            </span>
                                        </td>
                                        <td class="table-report__action w-56">
                                            <div class="flex justify-center items-center">
                                                <a class="flex items-center text-theme-6" href="{{ route('removeBiaya', $pd->id_uang) }}" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')"> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="intro-y col-span-12 lg:col-span-6">
                            <!-- BEGIN: Form Layout -->
                            <h2 class="font-bold text-lg mb-5">Uang Kursus</h2>
                            <div class="intro-y box p-5 mb-5">
                                <form action="{{ route('addBiaya', 'kursus') }}" method="post">
                                    @csrf
                                    <div>
                                        <label>Jumlah</label>
                                        <input type="text" class="input w-full border mt-2" name="jumlah" placeholder="Masukkan Jumlah">
                                    </div>
                                    <div class="text-right mt-5">
                                        <button type="submit" class="button w-36 bg-theme-1 text-white">Tambah Ke Daftar Biaya</button>
                                    </div>
                                </form>
                            </div>
                            <!-- END: Form Layout -->
                            <table class="table table-report mt-2 data-table">
                                <thead>
                                    <tr>
                                        <th class="text-center whitespace-no-wrap">NO</th>
                                        <th class="text-center whitespace-no-wrap">JUMLAH</th>
                                        <th class="text-center whitespace-no-wrap">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($kursus as $kr)
                                    <tr>
                                        <td class="text-center">
                                            <span class="font-medium">
                                                {{ $loop->iteration }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <span class="font-medium">
                                                {{ $kr->jumlah }}
                                            </span>
                                        </td>
                                        <td class="table-report__action w-56">
                                            <div class="flex justify-center items-center">
                                                <a class="flex items-center text-theme-6" href="{{ route('removeBiaya', $kr->id_uang) }}" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')"> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="intro-y col-span-12 lg:col-span-6">
                            <!-- BEGIN: Form Layout -->
                            <h2 class="font-bold text-lg mb-5">Uang Ujian & Sertifikat</h2>
                            <div class="intro-y box p-5 mb-5">
                                <form action="{{ route('addBiaya', 'ujian_sertifikat') }}" method="post">
                                    @csrf
                                    <div>
                                        <label>Jumlah</label>
                                        <input type="text" class="input w-full border mt-2" name="jumlah" placeholder="Masukkan Jumlah">
                                    </div>
                                    <div class="text-right mt-5">
                                        <button type="submit" class="button w-36 bg-theme-1 text-white">Tambah Ke Daftar Biaya</button>
                                    </div>
                                </form>
                            </div>
                            <!-- END: Form Layout -->
                            <table class="table table-report mt-2 data-table">
                                <thead>
                                    <tr>
                                        <th class="text-center whitespace-no-wrap">NO</th>
                                        <th class="text-center whitespace-no-wrap">JUMLAH</th>
                                        <th class="text-center whitespace-no-wrap">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($ujian as $uj)
                                    <tr>
                                        <td class="text-center">
                                            <span class="font-medium">
                                                {{ $loop->iteration }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <span class="font-medium">
                                                {{ $uj->jumlah }}
                                            </span>
                                        </td>
                                        <td class="table-report__action w-56">
                                            <div class="flex justify-center items-center">
                                                <a class="flex items-center text-theme-6" href="{{ route('removeBiaya', $uj->id_uang) }}" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')"> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="intro-y col-span-12 lg:col-span-6">
                            <!-- BEGIN: Form Layout -->
                            <h2 class="font-bold text-lg mb-5">Uang Buku</h2>
                            <div class="intro-y box p-5 mb-5">
                                <form action="{{ route('addBiaya', 'buku') }}" method="post">
                                    @csrf
                                    <div>
                                        <label>Jumlah</label>
                                        <input type="text" class="input w-full border mt-2" name="jumlah" placeholder="Masukkan Jumlah">
                                    </div>
                                    <div class="text-right mt-5">
                                        <button type="submit" class="button w-36 bg-theme-1 text-white">Tambah Ke Daftar Biaya</button>
                                    </div>
                                </form>
                            </div>
                            <!-- END: Form Layout -->
                            <table class="table table-report mt-2 data-table">
                                <thead>
                                    <tr>
                                        <th class="text-center whitespace-no-wrap">NO</th>
                                        <th class="text-center whitespace-no-wrap">JUMLAH</th>
                                        <th class="text-center whitespace-no-wrap">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($buku as $bk)
                                    <tr>
                                        <td class="text-center">
                                            <span class="font-medium">
                                                {{ $loop->iteration }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <span class="font-medium">
                                                {{ $bk->jumlah }}
                                            </span>
                                        </td>
                                        <td class="table-report__action w-56">
                                            <div class="flex justify-center items-center">
                                                <a class="flex items-center text-theme-6" href="{{ route('removeBiaya', $bk->id_uang) }}" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')"> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
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
    $('.data-table').DataTable();
})
</script>
@endsection