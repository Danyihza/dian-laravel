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
                    <div class="intro-y col-span-12 lg:col-span-6">
                        <!-- BEGIN: Form Layout -->
                        <div class="intro-y box p-5 mb-5">
                            <form action="{{ route('changePassword') }}" method="post">
                                @csrf
                                <input type="hidden" name="id_admin" value="{{$admin->id_admin}}">
                                <div>
                                    <label>Nama</label>
                                    <input type="text" class="input w-full border mt-2" value="{{ $admin->nama }}" name="nama" placeholder="Masukkan Nama" disabled>
                                </div>
                                <div class="mt-3">
                                    <label>Username</label>
                                    <input type="text" class="input w-full border mt-2" value="{{ $admin->username }}" name="username" placeholder="Masukkan Username" disabled>
                                </div>
                                <div class="mt-3">
                                    <label>Password Baru</label>
                                    <input type="password" class="input w-full border mt-2" name="password" placeholder="Masukkan Password Baru">
                                </div>
                                <div class="mt-3">
                                    <label>Konfirmasi Password Baru</label>
                                    <input type="password" class="input w-full border mt-2" name="conf_password" placeholder="Masukkan Konfirmasi Password Baru">
                                </div>
                                <div class="text-right mt-5">
                                    <button type="submit" class="button w-36 bg-theme-1 text-white">Ubah Password</button>
                                </div>
                            </form>
                        </div>
                        <!-- END: Form Layout -->
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
@endsection