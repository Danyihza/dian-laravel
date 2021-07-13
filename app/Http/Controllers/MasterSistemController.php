<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Cabang;
use App\Models\Jabatan;
use App\Models\Karyawan;
use App\Models\Kursus;
use App\Models\Program;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

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

    public function addKaryawan(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'no_telepon' => 'required',
            'cabang' => 'required',
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

    public function addJabatan(Request $request)
    {
        $request->validate([
            'jenis_jabatan' => 'required',
        ]);

        $newJabatan = new Jabatan;
        $newJabatan->id_jabatan = Str::random(32);
        $newJabatan->jenis_jabatan = $request->jenis_jabatan;
        $newJabatan->save();
        return Redirect::back()->with('success', 'Data Jabatan Baru Berhasil Ditambahkan');
    }

    public function addCabang(Request $request)
    {
        $request->validate([
            'kota' => 'required',
            'alamat' => 'required',
        ]);
        
        $newCabang = new Cabang;
        $newCabang->id_cabang = Str::random(32);
        $newCabang->kota = $request->kota;
        $newCabang->alamat = $request->alamat;
        $newCabang->save();
        return Redirect::back()->with('success', 'Data Cabang Baru Berhasil Ditambahkan');
    }

    public function addKursus(Request $request)
    {
        $request->validate([
            'nama_kursus' => 'required'
        ]);

        $newKursus = new Kursus;
        $newKursus->nama_kursus = $request->nama_kursus;
        $newKursus->save();
        return Redirect::back()->with('success', 'Data Kursus Baru Berhasil Ditambahkan');
    }

    public function addProgram(Request $request)
    {
        $request->validate([
            'nama_program' => 'required'
        ]);

        $newProgram = new Program;
        $newProgram->nama_program = $request->nama_program;
        $newProgram->save();
        return Redirect::back()->with('success', 'Data Program Baru Berhasil Ditambahkan');
    }

}
