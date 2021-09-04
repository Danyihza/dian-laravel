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
            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">
                    <!-- BEGIN: General Report -->
                    <div class="col-span-12 mt-8">
                        <div class="intro-y flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5">
                                Cabang: {{ $cabangs->alamat . ' - ' . $cabangs->kota}}
                            </h2>
                            <a href="" class="ml-auto flex text-theme-1 dark:text-theme-10"> <i
                                    data-feather="refresh-ccw" class="w-4 h-4 mr-3"></i> Reload Data </a>
                        </div>
                        <div class="grid grid-cols-12 gap-6 mt-5">
                            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                <div class="report-box zoom-in" onclick="window.location = '{{ route('arsipSiswaView') }}'">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-feather="users"
                                                class="report-box__icon text-theme-10"></i>
                                        </div>
                                        <div class="text-3xl font-bold leading-8 mt-6">{{ $siswa }}</div>
                                        <div class="text-base text-gray-600 mt-1">Siswa Aktif</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                <div class="report-box zoom-in" onclick="window.location = '{{ route('programView') }}'">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-feather="code"
                                                class="report-box__icon text-theme-11"></i>
                                        </div>
                                        <div class="text-3xl font-bold leading-8 mt-6">{{ $program }}</div>
                                        <div class="text-base text-gray-600 mt-1">Program</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                <div class="report-box zoom-in" onclick="window.location = '{{ route('cabangView') }}'">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-feather="monitor" class="report-box__icon text-theme-12"></i>
                                        </div>
                                        <div class="text-3xl font-bold leading-8 mt-6">{{ $cabang }}</div>
                                        <div class="text-base text-gray-600 mt-1">Total Cabang</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                <div class="report-box zoom-in" onclick="window.location = '{{ route('listAdminView') }}'">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-feather="user-check" class="report-box__icon text-theme-9"></i>
                                        </div>
                                        <div class="text-3xl font-bold leading-8 mt-6">{{ $admin }}</div>
                                        <div class="text-base text-gray-600 mt-1">Administrator</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if(session('login-data')['level'] == 'Super')
                        <div class="intro-y mt-8">
                            <a href="{{ route('resetData') }}" class="group relative w-56 flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                            onclick="return confirm('Apakah anda yakin ingin mereset seluruh data siswa ?')"
                            >
                                <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd"></path></svg>
                                </span>
                                Reset Data Siswa
                            </a>
                        </div>
                        @endif
                    </div>
                    <!-- END: General Report -->
                </div>
            </div>
        </div>
        <!-- END: Content -->
    </div>
</body>
@endsection

@section('script')
<script>

</script>
@endsection