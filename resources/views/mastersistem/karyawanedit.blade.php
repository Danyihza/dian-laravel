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
                            <form action="{{ route('editKaryawan', $karyawan->id_karyawan) }}" method="post">
                                @csrf
                                <div>
                                    <label>Nama</label>
                                    <input type="text" class="input w-full border mt-2" name="nama" value="{{ $karyawan->nama }}" placeholder="Masukkan Nama Karyawan">
                                </div>
                                <div class="mt-3">
                                    <label>Jabatan</label>
                                    <select name="jabatan" class="tail-select w-full">
                                        <option value="0" selected>Pilih Jabatan</option>
                                        @foreach ($jabatan as $jbt)
                                            <option value="{{ $jbt->id_jabatan }}" {{ $jbt->id_jabatan == $karyawan->jabatan ? 'selected' : '' }}>{{ $jbt->jenis_jabatan }}</option>
                                        @endforeach
                                    </select> 
                                </div>
                                <div class="mt-3">
                                    <label>No Telepon</label>
                                    <input type="text" class="input w-full border mt-2" name="no_telepon" value="{{ $karyawan->no_telepon }}" placeholder="Masukkan No Telepon Karyawan">
                                </div>
                                <div class="mt-3">
                                    <label>Cabang</label>
                                    <select name="cabang" class="tail-select w-full">
                                        <option value="0" selected>Pilih Cabang</option>
                                        @foreach ($cabang as $cbg)
                                            <option value="{{ $cbg->id_cabang }}" {{ $cbg->id_cabang == $karyawan->cabang ? 'selected' : '' }}>{{ $cbg->alamat }} - {{ $cbg->kota }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="text-right mt-5">
                                    <button type="submit" class="button w-36 bg-theme-1 text-white">Ubah Data Karyawan</button>
                                </div>
                            </form>
                        </div>
                        <!-- END: Form Layout -->
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
@endsection