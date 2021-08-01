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
                        @if(session('login-data')['level'] == 'Super')
                            <div class="intro-y box p-5 mb-5">
                                <form action="{{ route('addAdmin') }}" method="post">
                                    @csrf
                                    <div>
                                        <label>Nama</label>
                                        <input type="text" class="input w-full border mt-2" name="nama" placeholder="Masukkan Nama">
                                    </div>
                                    <div class="mt-3">
                                        <label>Username</label>
                                        <input type="text" class="input w-full border mt-2" name="username" placeholder="Masukkan Username">
                                    </div>
                                    <div class="mt-3">
                                        <label>Password</label>
                                        <input type="password" class="input w-full border mt-2" name="password" placeholder="Masukkan Password">
                                    </div>
                                    <div class="mt-3">
                                        <label>Konfirmasi Password</label>
                                        <input type="password" class="input w-full border mt-2" name="conf_password" placeholder="Masukkan Konfirmasi Password">
                                    </div>
                                    <div class="mt-3"> 
                                        <label>Cabang</label>
                                        <div class="mt-2"> 
                                            <select name="cabang" class="tail-select w-full">
                                                <option value="0" selected>Pilih Cabang</option>
                                                @foreach ($cabang as $cbg)
                                                <option value="{{ $cbg->id_cabang }}">{{ $cbg->alamat }} - {{ $cbg->kota }}</option>
                                                @endforeach
                                            </select> 
                                        </div>
                                    </div>
                                    <div class="mt-3"> 
                                        <label>Level Admin</label>
                                        <div class="mt-2"> 
                                            <select name="level" class="tail-select w-full">
                                                <option value="0" selected>Pilih Level</option>
                                                <option value="Normal">Normal Admin</option>
                                                <option value="Super">Super Admin</option>
                                            </select> 
                                        </div>
                                    </div>
                                    <div class="text-right mt-5">
                                        <button type="submit" class="button w-24 bg-theme-1 text-white">Tambah</button>
                                    </div>
                                </form>
                            </div>
                        @endif
                        <!-- END: Form Layout -->
                    </div>
                    <table id="pembayaran" class="table table-report mt-2">
                        <thead>
                            <tr>
                                <th class="text-center whitespace-no-wrap">NO</th>
                                <th class="text-center whitespace-no-wrap">NAMA</th>
                                <th class="text-center whitespace-no-wrap">USERNAME</th>
                                <th class="text-center whitespace-no-wrap">LEVEL</th>
                                @if(session('login-data')['level'] == 'Super')
                                    <th class="text-center whitespace-no-wrap">AKSI</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($admin as $adm)
                            <tr>
                                <td class="text-center">
                                    <span class="font-medium">
                                        {{$loop->iteration}}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <span class="font-medium">
                                        {{$adm->nama}}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <span class="font-medium">
                                        {{$adm->username}}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <span class="font-medium">
                                        {{$adm->level . ' Admin'}}
                                    </span>
                                </td>
                                @if(session('login-data')['level'] == 'Super')
                                    <td class="table-report__action w-56">
                                        <div class="flex justify-center items-center">
                                            <a class="flex items-center text-theme-12 mr-3" href="{{ route('changePasswordView', $adm->id_admin) }}" > <i data-feather="key" class="w-4 h-4 mr-1"></i> Update Password </a>
                                            <a class="flex items-center text-theme-6" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')" href="{{ route('removeAdmin', $adm->id_admin) }}" data-toggle="modal" data-target="#delete-confirmation-modal"> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
                                        </div>
                                    </td>
                                @endif
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