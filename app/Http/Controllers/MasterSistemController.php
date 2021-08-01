<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Cabang;
use App\Models\Jabatan;
use App\Models\Karyawan;
use App\Models\Kursus;
use App\Models\Level;
use App\Models\Program;
use App\Models\Uang;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;

class MasterSistemController extends Controller
{
    public function karyawanView()
    {
        $data['title'] = 'Karyawan';
        $data['parent'] = 'Master Sistem';
        $data['jabatan'] = Jabatan::orderBy('created_at', 'ASC')->get();
        $data['cabang'] = Cabang::orderBy('created_at', 'ASC')->get();
        $data['karyawan'] = Karyawan::orderBy('created_at', 'ASC')->get();
        return view('mastersistem.karyawan', $data);
    }

    public function cabangView()
    {
        $data['title'] = 'Cabang';
        $data['parent'] = 'Master Sistem';
        $data['cabang'] = Cabang::orderBy('created_at', 'ASC')->get();
        return view('mastersistem.cabang', $data);
    }

    public function kursusView()
    {
        $data['title'] = 'Kursus';
        $data['parent'] = 'Master Sistem';
        $data['kursus'] = Kursus::orderBy('created_at', 'ASC')->get();
        return view('mastersistem.kursus', $data);
    }

    public function programView()
    {
        $data['title'] = 'Program';
        $data['parent'] = 'Master Sistem';
        $data['program'] = Program::orderBy('created_at', 'ASC')->get();
        return view('mastersistem.program', $data);
    }
    
    public function jabatanView()
    {
        $data['title'] = 'Jabatan';
        $data['parent'] = 'Master Sistem';
        $data['jabatan'] = Jabatan::orderBy('created_at', 'ASC')->get();
        return view('mastersistem.jabatan', $data);
    }

    public function biayaView()
    {
        $data['title'] = 'Biaya';
        $data['parent'] = 'Master Sistem';
        $data['pendaftaran'] = Uang::where('jenis_uang', 'pendaftaran')->orderBy('jumlah', 'ASC')->get();
        $data['kursus'] = Uang::where('jenis_uang', 'kursus')->orderBy('jumlah', 'ASC')->get();
        $data['ujian'] = Uang::where('jenis_uang', 'ujian_sertifikat')->orderBy('jumlah', 'ASC')->get();
        $data['buku'] = Uang::where('jenis_uang', 'buku')->orderBy('jumlah', 'ASC')->get();
        // dd($data);
        return view('mastersistem.biaya', $data);
    }

    public function levelView()
    {
        $data['title'] = 'Level';
        $data['parent'] = 'Master Sistem';
        $data['level'] = Level::all();
        return view('mastersistem.level', $data);
    }

    public function addKaryawan(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'no_telepon' => 'required',
            'cabang' => 'required',
        ],[
            'required' => 'Mohon lengkapi semua form yang ada'
        ]);
        $newKaryawan = new Karyawan;
        $newKaryawan->id_karyawan = Str::random(32);
        $newKaryawan->nama = $request->nama;
        $newKaryawan->jabatan = $request->jabatan;
        $newKaryawan->no_telepon = $request->no_telepon;
        $newKaryawan->cabang = $request->cabang;
        $newKaryawan->save();
        return Redirect::back()->with('success', 'Data Karyawan Baru Berhasil Ditambahkan');
    }

    public function showKaryawan($id_karyawan)
    {
        $data['title'] = 'Karyawan';
        $data['parent'] = 'Master Sistem';
        $data['karyawan'] = Karyawan::where('id_karyawan', $id_karyawan)->first();
        $data['jabatan'] = Jabatan::all();
        $data['cabang'] = Cabang::all();
        return view('mastersistem.karyawanedit', $data);
    }

    public function removeKaryawan($id_karyawan)
    {
        $karyawan = Karyawan::where('id_karyawan', $id_karyawan)->first();
        $karyawan->delete();
        return Redirect::back()->with('success', 'Data Karyawan Berhasil Dihapus');
    }

    public function editKaryawan($id_karyawan, Request $request)
    {
        $karyawan = Karyawan::where('id_karyawan', $id_karyawan)->first();
        $karyawan->nama = $request->nama;
        $karyawan->jabatan = $request->jabatan;
        $karyawan->no_telepon = $request->no_telepon;
        $karyawan->cabang = $request->cabang;
        $karyawan->save();
        return Redirect::route('karyawanView')->with('success', 'Data Karyawan Berhasil Diubah');
    }

    public function addJabatan(Request $request)
    {
        $request->validate([
            'jenis_jabatan' => 'required',
        ],[
            'required' => 'Mohon lengkapi semua form yang ada'
        ]);
        

        $newJabatan = new Jabatan;
        $newJabatan->id_jabatan = Str::random(32);
        $newJabatan->jenis_jabatan = $request->jenis_jabatan;
        $newJabatan->save();
        return Redirect::back()->with('success', 'Data Jabatan Baru Berhasil Ditambahkan');
    }

    public function removeJabatan($id_jabatan)
    {
        $jabatan = Jabatan::where('id_jabatan', $id_jabatan)->first();
        $jabatan->delete();
        return Redirect::back()->with('success', 'Data Jabatan Berhasil Dihapus');
    }

    public function addCabang(Request $request)
    {
        $request->validate([
            'kota' => 'required',
            'alamat' => 'required',
        ],[
            'required' => 'Mohon lengkapi semua form yang ada'
        ]);
        
        $newCabang = new Cabang;
        $newCabang->kota = $request->kota;
        $newCabang->alamat = $request->alamat;
        $newCabang->save();
        return Redirect::back()->with('success', 'Data Cabang Baru Berhasil Ditambahkan');
    }

    public function deleteCabang($id_cabang)
    {
        $cabang = Cabang::where('id_cabang', $id_cabang)->first();
        $cabang->delete();
        return Redirect::back()->with('success', 'Data Cabang Berhasil Dihapus');
    }

    public function addKursus(Request $request)
    {
        $request->validate([
            'nama_kursus' => 'required'
        ],[
            'required' => 'Mohon lengkapi semua form yang ada'
        ]);

        $newKursus = new Kursus;
        $newKursus->nama_kursus = $request->nama_kursus;
        $newKursus->save();
        return Redirect::back()->with('success', 'Data Kursus Baru Berhasil Ditambahkan');
    }

    public function removeKursus($id_kursus)
    {
        $kursus = Kursus::where('id_kursus', $id_kursus)->first();
        $kursus->delete();
        return Redirect::back()->with('success', 'Data Kursus Berhasil Dihapus');
    }

    public function addProgram(Request $request)
    {
        $request->validate([
            'nama_program' => 'required'
        ],[
            'required' => 'Mohon lengkapi semua form yang ada'
        ]);

        $newProgram = new Program;
        $newProgram->nama_program = $request->nama_program;
        $newProgram->save();
        return Redirect::back()->with('success', 'Data Program Baru Berhasil Ditambahkan');
    }

    public function removeProgram($id_program)
    {
        $program = Program::where('id_program', $id_program)->first();
        $program->delete();
        return Redirect::back()->with('success', 'Data Program Berhasil Dihapus');
    }

    public function addBiaya($jenis_biaya, Request $request) 
    {
        $newBiaya = new Uang;
        $newBiaya->id_uang = strtoupper(Str::random(8));
        $newBiaya->jenis_uang = $jenis_biaya;
        $newBiaya->jumlah = $request->jumlah;
        $newBiaya->save();
        return Redirect::back()->with('success', 'Biaya sukses ditambahkan');
    }

    public function removeBiaya($id_biaya)
    {
        $biaya = Uang::where('id_uang', $id_biaya)->first();
        $biaya->delete();
        return Redirect::back()->with('success', 'Biaya sukses dihapus dari daftar');
    }

    public function addLevel(Request $request)
    {
        $newLevel = new Level;
        $newLevel->nama_level = $request->nama_level;
        $newLevel->save();
        return Redirect::back()->with('success', 'Data Level Baru Berhasil Ditambahkan');
    }

    public function removeLevel($id_level)
    {
        $level = Level::where('id_level', $id_level)->first();
        $level->delete();
        return Redirect::back()->with('success', 'Data Level Berhasil Dihapus');
    }

    public function changeLogo(Request $request)
    {
        File::delete('assets/images/dian-logo.png');
        $newLogo = $request->file('gambar');
        $newLogo->move('assets/images/', 'dian-logo.png');
        return Redirect::back()->with('success', 'Logo Sukses Diubah');
    }

}
