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
                    <form action="{{ route('editSiswa') }}?id_siswa={{ $detail->hasSiswa->id_siswa }}&id_detail_kursus={{ $detail->hasDetailKursus->id_detail }}" method="post">
                        @csrf
                        <div class="grid grid-cols-12 gap-8 mt-5">
                            <div class="intro-y col-span-12 lg:col-span-6">
                                <!-- BEGIN: Form Layout -->
                                <div class="intro-y box p-5">
                                    <div>
                                        <label>Tanggal Daftar</label>
                                        <input class="mt-2 datepicker input w-full border block" value="{{ date('d/m/Y', strtotime($detail->hasDetailKursus->tanggal_daftar)) }}" name="tanggal_daftar" data-single-mode="true">
                                    </div>
                                    <div class="mt-3">
                                        <label>Nama</label>
                                        <input type="text" class="input w-full border mt-2" name="nama" value="{{ $detail->hasSiswa->nama }}" placeholder="Masukkan Nama" required>
                                    </div>
                                    <div class="mt-3"> 
                                        <label>Kota/Kab Lahir</label>
                                        <div class="mt-2"> 
                                            <select data-search="true" name="kota_lahir" class="tail-select w-full">
                                                <option value="0" selected>Pilih Kota/Kab Lahir</option>
                                                @foreach($regencies as $reg)
                                                    <option value="{{ $reg->id }}" {{ $reg->id == $detail->hasSiswa->kota_lahir ? ' selected' : ''}}>{{ $reg->name }}</option>
                                                @endforeach
                                            </select> 
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <label>Tanggal Lahir</label>
                                        <input class="mt-2 datepicker input w-full border block" value="{{ date('d/m/Y', strtotime($detail->hasSiswa->tanggal_lahir)) }}" name="tanggal_lahir" data-single-mode="true">
                                    </div>
                                    <div class="mt-3"> 
                                        <label class="flex flex-col sm:flex-row"> 
                                            Alamat 
                                        </label> 
                                        <textarea class="input w-full border mt-2" name="alamat" placeholder="Masukkan Alamat" rows="5" required>{{$detail->hasSiswa->alamat}}</textarea>
                                    </div>
                                    <div class="mt-3"> 
                                        <label>Kota/Kab Sekarang</label>
                                        <div class="mt-2"> 
                                            <select data-search="true" name="kota" class="tail-select w-full">
                                                <option value="0" selected>Pilih Kota/Kab Sekarang</option>
                                                @foreach($regencies as $reg)
                                                    <option value="{{ $reg->id }}" {{ $reg->id == $detail->hasSiswa->kota_tinggal ? ' selected' : ''}}>{{ $reg->name }}</option>
                                                @endforeach
                                            </select> 
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <label>No. Telepon</label>
                                        <input type="text" class="input w-full border mt-2" name="no_telepon" value="{{$detail->hasSiswa->no_telpon}}" placeholder="Masukkan Nomor Telepon" required>
                                    </div>
                                    <div class="mt-3"> 
                                        <label>Pendidikan</label>
                                        <div class="mt-2"> 
                                            <select name="pendidikan" class="tail-select w-full">
                                                @foreach($pendidikan as $p)
                                                    <option value="{{$p}}" {{$p == $detail->hasSiswa->pendidikan ? 'selected' : ''}}>{{$p}}</option>
                                                @endforeach
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
                                            <select name="kursus" data-search="true" class="tail-select w-full">
                                                <option value="0" selected>Pilih Kursus</option>
                                                @foreach($kursus as $krs)
                                                    <option value="{{$krs->id_kursus}}" {{$krs->id_kursus == $detail->hasDetailKursus->kursus ? 'selected' : ''}}>{{$krs->nama_kursus}}</option>
                                                @endforeach
                                            </select> 
                                        </div>
                                    </div>
                                    <div class="mt-3"> 
                                        <label>Program</label>
                                        <div class="mt-2"> 
                                            <select name="program" data-search="true" class="tail-select w-full">
                                                <option value="0" selected>Pilih Program</option>
                                                @foreach ($program as $prg)
                                                    <option value="{{ $prg->id_program }}" {{$prg->id_program == $detail->hasDetailKursus->program ? 'selected' : ''}}>{{ $prg->nama_program }}</option>
                                                @endforeach
                                            </select> 
                                        </div>
                                    </div>
                                    <div class="mt-3"> 
                                        <label>Level</label>
                                        <div class="mt-2"> 
                                            <select name="level" data-search="true" class="tail-select w-full">
                                                <option value="0" selected>Pilih Level</option>
                                                @foreach($level as $lvl)
                                                    <option value="{{ $lvl->id_level }}" {{ $lvl->id_level == $detail->hasDetailKursus->level ? 'selected' : '' }}>{{$lvl->nama_level}}</option>
                                                @endforeach
                                            </select> 
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <label>Hari Kursus</label>
                                        <select data-placeholder="Pilih Hari Kursus" data-search="true" name="hari_kursus[]" class="tail-select w-full" multiple required>
                                            @foreach($hariTerpilih as $ht)
                                                <option value="{{$ht}}" selected>{{$ht}}</option>
                                            @endforeach
                                            @foreach($hari as $h)
                                                <option value="{{$h}}">{{$h}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mt-3">
                                        <label>Jam Kursus</label>
                                        <input type="text" class="input w-full border mt-2" name="jam_kursus" value={{$detail->hasDetailKursus->jam_kursus}} placeholder="Masukkan Jam Kursus" required>
                                    </div>
                                    <div class="mt-3">
                                        <label>No Urut</label>
                                        <input type="text" class="input w-full border mt-2" name="no_urut" value="{{ $detail->hasDetailKursus->no_urut }}" placeholder="Masukkan No Urut" required>
                                    </div>
                                    <div class="my-3">
                                        <label>NIS</label>
                                        <input type="text" class="input w-full border mt-2" name="nis" value="{{ $detail->hasSiswa->nis }}"placeholder="Masukkan NIS" required>
                                    </div>
                                    <div class="text-right mt-5">
                                        <a href={{ route('arsipSiswaView') }} class="button w-24 p-3 border dark:border-dark-5 text-gray-700 dark:text-gray-300 mr-1">Cancel</a>
                                        <button type="submit" class="button w-24 bg-theme-1 text-white">Simpan</button>
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
@endsection