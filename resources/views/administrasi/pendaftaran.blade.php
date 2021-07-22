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
            <div class="grid grid-cols-12 gap-6 mt-5">
                <div class="col-span-12 overflow-auto lg:overflow-visible">
                    <form action="{{ route('daftar') }}" method="post">
                        @csrf
                        @if(isset($redirect_to))
                            <input type="hidden" name="redirect_to" value="{{$redirect_to}}">
                        @endif
                        <div class="grid grid-cols-12 gap-8 mt-5">
                            <div class="intro-y col-span-12 lg:col-span-6">
                                <!-- BEGIN: Form Layout -->
                                <div class="intro-y box p-5">
                                    <div>
                                        <label>Tanggal Daftar</label>
                                        <input class="mt-2 datepicker input w-full border block" name="tanggal_daftar" data-single-mode="true" required>
                                    </div>
                                    <div class="mt-3">
                                        <label>Nama</label>
                                        <input type="text" class="input w-full border mt-2" name="nama" placeholder="Masukkan Nama" required>
                                    </div>
                                    <div class="mt-3"> 
                                        <label>Kota/Kab Lahir</label>
                                        <div class="mt-2"> 
                                            <select data-search="true" name="kota_lahir" class="tail-select w-full" required>
                                                <option value="" selected>Pilih Kota/Kab Lahir</option>
                                                @foreach($regencies as $reg)
                                                    <option value="{{ $reg->id }}">{{ $reg->name }}</option>
                                                @endforeach
                                            </select> 
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <label>Tanggal Lahir</label>
                                        <input class="mt-2 datepicker input w-full border block" name="tanggal_lahir" data-single-mode="true" required>
                                    </div>
                                    <div class="mt-3"> 
                                        <label class="flex flex-col sm:flex-row"> 
                                            Alamat 
                                        </label> 
                                        <textarea class="input w-full border mt-2" name="alamat" placeholder="Masukkan Alamat" rows="5" required></textarea>
                                    </div>
                                    <div class="mt-3"> 
                                        <label>Kota/Kab Sekarang</label>
                                        <div class="mt-2"> 
                                            <select data-search="true" name="kota" class="tail-select w-full" required>
                                                <option value="" selected>Pilih Kota/Kab Sekarang</option>
                                                @foreach($regencies as $reg)
                                                    <option value="{{ $reg->id }}">{{ $reg->name }}</option>
                                                @endforeach
                                            </select> 
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <label>No. Telepon</label>
                                        <input type="text" class="input w-full border mt-2" name="no_telepon" placeholder="Masukkan Nomor Telepon" required>
                                    </div>
                                    <div class="mt-3"> 
                                        <label>Pendidikan</label>
                                        <div class="mt-2"> 
                                            <select name="pendidikan" class="tail-select w-full" required>
                                                <option value="" selected>Pilih Pendidikan</option>
                                                <option value="SD">SD</option>
                                                <option value="SMP">SMP</option>
                                                <option value="SMA">SMA</option>
                                                <option value="SMA">SMA</option>
                                                <option value="D1">D1</option>
                                                <option value="D2">D2</option>
                                                <option value="D3">D3</option>
                                                <option value="D4">D4</option>
                                                <option value="S1">S1</option>
                                                <option value="S2">S2</option>
                                                <option value="S3">S3</option>
                                            </select> 
                                        </div>
                                    </div>
                                </div>
                                <!-- END: Form Layout -->
                            </div>
                            <div class="intro-y col-span-12 lg:col-span-6">
                                <!-- BEGIN: Form Layout -->
                                <div class="intro-y box p-5">
                                    <div> 
                                        <label>Kursus</label>
                                        <div class="mt-2"> 
                                            <select name="kursus" id="kursus" data-search="true" onchange="getNis()" class="tail-select w-full" required>
                                                <option value="" selected>Pilih Kursus</option>
                                                @foreach($kursus as $krs)
                                                    <option value="{{$krs->id_kursus}}">{{$krs->nama_kursus}}</option>
                                                @endforeach
                                            </select> 
                                        </div>
                                    </div>
                                    <div class="mt-3"> 
                                        <label>Program</label>
                                        <div class="mt-2"> 
                                            <select name="program" data-search="true" class="tail-select w-full" required>
                                                <option value="" selected>Pilih Program</option>
                                                @foreach ($program as $prg)
                                                    <option value="{{ $prg->id_program }}">{{ $prg->nama_program }}</option>
                                                @endforeach
                                            </select> 
                                        </div>
                                    </div>
                                    <div class="mt-3"> 
                                        <label>Level</label>
                                        <div class="mt-2"> 
                                            <select name="level" data-search="true" class="tail-select w-full" required>
                                                <option value="" selected>Pilih Level</option>
                                                @foreach ($level as $lvl)
                                                    <option value="{{ $lvl->id_level }}">{{$lvl->nama_level}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{-- <div class="mt-3">
                                        <label class="flex flex-col sm:flex-row"> 
                                            Catatan Kursus 
                                        </label> 
                                        <textarea class="input w-full border mt-2" name="catatan_kursus" placeholder="Masukkan Catatan Kursus" rows="5"></textarea>
                                    </div> --}}
                                    <div class="mt-3">
                                        <label>Hari Kursus</label>
                                        <div class="mt-2">
                                            <select data-placeholder="Pilih Hari Kursus" data-search="true" name="hari_kursus[]" class="tail-select w-full" multiple required>
                                                <option value="Senin">Senin</option>
                                                <option value="Selasa">Selasa</option>
                                                <option value="Rabu">Rabu</option>
                                                <option value="Kamis">Kamis</option>
                                                <option value="Jumat">Jumat</option>
                                                <option value="Sabtu">Sabtu</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <label>Jam Kursus</label>
                                        <input type="text" class="input w-full border mt-2" name="jam_kursus" placeholder="Masukkan Jam Kursus" required>
                                    </div>
                                    <div class="mt-3">
                                        <label>No Urut</label>
                                        <input type="text" class="input w-full border mt-2" name="no_urut" id="no_urut" placeholder="Pilih Kursus untuk menampilkan nomor urut" readonly required>
                                    </div>
                                    <div class="my-3">
                                        <label>NIS</label>
                                        <input type="text" class="input w-full border mt-2" id="nis" name="nis" placeholder="Pilih Kursus untuk menampilkan NIS" readonly required>
                                    </div>
                                    <div class="border-b border-gray-200"></div>
                                    <div class="mt-3">
                                        <label>Uang Pendaftaran</label>
                                        <div class="mt-2">
                                            <select name="uang_pendaftaran" id="uang_pendaftaran" data-search="true" class="tail-select w-full" onchange="hitungJumlah()" required>
                                                <option value="" selected>Pilih Uang Pendaftaran</option>
                                                @foreach($uang_pendaftaran as $up)
                                                    <option value="{{ $up->jumlah }}">Rp {{ $up->jumlah }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <label>Uang Kursus</label>
                                        <div class="mt-2">
                                            <select name="uang_kursus" id="uang_kursus" data-search="true" class="tail-select w-full" onchange="hitungJumlah()" required>
                                                <option value="" selected>Pilih Uang Kursus</option>
                                                @foreach($uang_kursus as $uk)
                                                    <option value="{{ $uk->jumlah }}">Rp {{ $uk->jumlah }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <label>Uang Ujian & Sertifikat</label>
                                        <div class="mt-2">
                                            <select name="uang_ujian_sertifikat" id="uang_ujian" data-search="true" class="tail-select w-full" onchange="hitungJumlah()" required>
                                                <option value="" selected>Pilih Uang Ujian & Sertifikat</option>
                                                @foreach($uang_ujian as $uu)
                                                    <option value="{{ $uu->jumlah }}">Rp {{ $uu->jumlah }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <label>Uang Buku</label>
                                        <div class="mt-2">
                                            <select name="uang_buku" id="uang_buku" data-search="true" class="tail-select w-full" onchange="hitungJumlah()" required>
                                                <option value="" selected>Pilih Uang Buku</option>
                                                @foreach($uang_buku as $ub)
                                                    <option value="{{ $ub->jumlah }}">Rp {{ $ub->jumlah }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{-- <div class="mt-3">
                                        <label>Uang Pendaftaran</label>
                                        <input type="text" onchange="hitungJumlah()" id="uang_pendaftaran" class="harga input w-full border mt-2" name="uang_pendaftaran" placeholder="Masukkan Uang Pendaftaran">
                                    </div>
                                    <div class="mt-3">
                                        <label>Uang Kursus</label>
                                        <input type="text" onchange="hitungJumlah()" id="uang_kursus" class="harga input w-full border mt-2" name="uang_kursus" placeholder="Masukkan Uang Kursus">
                                    </div>
                                    <div class="mt-3">
                                        <label>Uang Ujian & Sertifikat</label>
                                        <input type="text" onchange="hitungJumlah()" id="uang_ujian_sertifikat" class="harga input w-full border mt-2" name="uang_ujian_sertifikat" placeholder="Masukkan Uang Ujian & Sertifikat">
                                    </div>
                                    <div class="mt-3">
                                        <label>Uang Buku</label>
                                        <input type="text" onchange="hitungJumlah()" id="uang_buku" class="harga input w-full border mt-2" name="uang_buku" placeholder="Masukkan Uang Buku">
                                    </div> --}}
                                    <div class="mt-3">
                                        <label>Jumlah</label>
                                        <input type="text" id="jumlah" class="input w-full border mt-2" name="jumlah" placeholder="Jumlah akan ditampilkan jika seluruh biaya sudah terinput" readonly required>
                                    </div>
                                    <div class="text-right mt-5">
                                        <button type="button" class="button w-24 border dark:border-dark-5 text-gray-700 dark:text-gray-300 mr-1">Cancel</button>
                                        <button type="submit" class="button w-24 bg-theme-1 text-white">Save</button>
                                    </div>
                                </div>
                                <!-- END: Form Layout -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- END: Content -->
    </div>
</body>
@endsection

@section('script')
<script src="{{ asset('assets/js/autonumeric@4.1.0.js') }}"></script>
<script>
    new AutoNumeric.multiple('.harga',{
        allowDecimalPadding: false,
        decimalCharacter: "",
        minimumValue: "0",
        unformatOnSubmit: true
    });
</script>
<script>
    function hitungJumlah(){
        const uang_pendaftaran =  parseInt(document.getElementById('uang_pendaftaran').value) || 0;
        const uang_kursus =  parseInt(document.getElementById('uang_kursus').value) || 0;
        const uang_ujian =  parseInt(document.getElementById('uang_ujian').value) || 0;
        const uang_buku =  parseInt(document.getElementById('uang_buku').value) || 0;
        const jumlah =  document.getElementById('jumlah');

        const jumlah_biaya = uang_pendaftaran + uang_kursus + uang_ujian + uang_buku;
        jumlah.value = jumlah_biaya;
    }

    async function getNis(){
        const cabang = {{ session('login-data')['cabang'] }};
        const kursus = document.getElementById('kursus').value;
        const inputnis = document.getElementById('nis');
        const no_urut = document.getElementById('no_urut');
        const nis = await fetch("{{ route('api.getnis') }}", {
            method: 'POST',
            headers: {
            'Content-Type': 'application/json'
            // 'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: JSON.stringify({
                cabang: cabang,
                kursus: kursus
            })
        })
        .then(res => res.json())
        .then(result => result.data)
        .catch(error => console.error(error))
        inputnis.value = nis;
        no_urut.value = parseInt(nis.slice(-2));
    }
</script>
@endsection