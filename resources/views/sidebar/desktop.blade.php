<!-- BEGIN: Side Menu -->
<nav class="side-nav">
    <a href="" class="intro-x flex items-center pl-5 pt-4">
        <img alt="Midone Tailwind HTML Admin Template" class="w-8"
            src="{{ asset('assets') }}/images/dian-logo.png">
        <span class="hidden xl:block text-white text-lg ml-3"><span class="font-medium">MAIS</span>
        </span>
    </a>
    <div class="side-nav__devider my-6"></div>
    <ul>
        <li>
            <a href="{{ route('dashboard') }}" class="side-menu {{ $title == 'dashboard' ? 'side-menu--active' : ''}}">
                <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                <div class="side-menu__title"> Dashboard </div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="side-menu {{ isset($parent) && $parent == 'administrasi' ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="book"></i> </div>
                <div class="side-menu__title"> Administrasi <i data-feather="chevron-down"
                        class="side-menu__sub-icon"></i> </div>
            </a>
            <ul class="{{ isset($parent) && $parent == 'administrasi' ? 'side-menu__sub-open' : '' }}">
                <li>
                    <a href="{{ route('pendaftaranView') }}" class="side-menu {{ $title == 'pendaftaran' ? 'side-menu--active' : ''}}">
                        <div class="side-menu__icon"> <i data-feather="user-plus"></i> </div>
                        <div class="side-menu__title"> Pendaftaran </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('pembayaranView') }}" class="side-menu {{ $title == 'pembayaran' ? 'side-menu--active' : ''}}">
                        <div class="side-menu__icon"> <i data-feather="dollar-sign"></i> </div>
                        <div class="side-menu__title"> Pembayaran </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('pengeluaranView') }}" class="side-menu {{ $title == 'pengeluaran' ? 'side-menu--active' : ''}}">
                        <div class="side-menu__icon"> <i data-feather="tag"></i> </div>
                        <div class="side-menu__title"> Pengeluaran </div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="side-menu {{ isset($parent) && $parent == 'View & Laporan' ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
                <div class="side-menu__title"> View & Laporan <i data-feather="chevron-down"
                        class="side-menu__sub-icon"></i> </div>
            </a>
            <ul class="{{ isset($parent) && $parent == 'View & Laporan' ? 'side-menu__sub-open' : '' }}">
                <li>
                    <a href="{{ route('arsipSiswaView') }}" class="side-menu {{ $title == 'Arsip Siswa' ? 'side-menu--active' : ''}}">
                        <div class="side-menu__icon"> <i data-feather="users"></i> </div>
                        <div class="side-menu__title"> Arsip Siswa </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('arsipPembayaranView') }}" class="side-menu {{ $title == 'Arsip Pembayaran' ? 'side-menu--active' : ''}}">
                        <div class="side-menu__icon"> <i data-feather="dollar-sign"></i> </div>
                        <div class="side-menu__title"> Arsip Pembayaran </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('laporanHarianView') }}" class="side-menu {{ $title == 'Laporan Harian' ? 'side-menu--active' : ''}}">
                        <div class="side-menu__icon"> <i data-feather="book-open"></i> </div>
                        <div class="side-menu__title"> Laporan Harian </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('laporanPeriodeView') }}" class="side-menu {{ $title == 'Laporan Periode' ? 'side-menu--active' : ''}}">
                        <div class="side-menu__icon"> <i data-feather="book-open"></i> </div>
                        <div class="side-menu__title"> Laporan Periode </div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="side-menu {{ isset($parent) && $parent == 'Master Sistem' ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="database"></i> </div>
                <div class="side-menu__title"> Master Sistem <i data-feather="chevron-down"
                        class="side-menu__sub-icon"></i> </div>
            </a>
            <ul class="{{ isset($parent) && $parent == 'Master Sistem' ? 'side-menu__sub-open' : '' }}">
                <li>
                    <a href="{{ route('karyawanView') }}" class="side-menu {{ $title == 'Karyawan' ? 'side-menu--active' : ''}}">
                        <div class="side-menu__icon"> <i data-feather="user"></i> </div>
                        <div class="side-menu__title"> Karyawan </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('cabangView') }}" class="side-menu {{ $title == 'Cabang' ? 'side-menu--active' : ''}}">
                        <div class="side-menu__icon"> <i data-feather="git-branch"></i> </div>
                        <div class="side-menu__title"> Cabang </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('kursusView') }}" class="side-menu {{ $title == 'Kursus' ? 'side-menu--active' : ''}}">
                        <div class="side-menu__icon"> <i data-feather="bookmark"></i> </div>
                        <div class="side-menu__title"> Kursus </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('programView') }}" class="side-menu {{ $title == 'Program' ? 'side-menu--active' : ''}}">
                        <div class="side-menu__icon"> <i data-feather="code"></i> </div>
                        <div class="side-menu__title"> Program </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('jabatanView') }}" class="side-menu {{ $title == 'Jabatan' ? 'side-menu--active' : ''}}">
                        <div class="side-menu__icon"> <i data-feather="award"></i> </div>
                        <div class="side-menu__title"> Jabatan </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('biayaView') }}" class="side-menu {{ $title == 'Biaya' ? 'side-menu--active' : ''}}">
                        <div class="side-menu__icon"> <i data-feather="dollar-sign"></i> </div>
                        <div class="side-menu__title"> Biaya </div>
                    </a>
                </li>
            </ul>
        </li>
        @if(session('login-data')['level'] == 'Super')
        <li>
            <a href="{{ route('listAdminView') }}" class="side-menu {{ $title == 'Administrator' ? 'side-menu--active' : ''}}">
                <div class="side-menu__icon"> <i data-feather="user-check"></i> </div>
                <div class="side-menu__title"> Admin </div>
            </a>
        </li>
        @endif
    </ul>
</nav>
<!-- END: Side Menu -->