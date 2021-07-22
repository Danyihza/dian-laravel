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
            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">
                    <!-- BEGIN: General Report -->
                    <div class="col-span-12 mt-8">
                        <div class="intro-y flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5">
                                Dashboard
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