<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Cabang;
use App\Models\Detail_Kursus;
use App\Models\Detail_Transaksi;
use App\Models\Fk_detail_siswa;
use App\Models\Pembayaran;
use App\Models\Program;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class DashboardController extends Controller
{
    public function dashboard()
    {
        // $nis = Siswa::generateNis(1,4);
        // dd($nis);
        $data['title'] = 'dashboard';
        $data['siswa'] = Fk_detail_siswa::where('id_cabang', session('login-data')['cabang'])->count();
        $data['program'] = Program::count();
        $data['cabang'] = Cabang::count();
        $data['admin'] = Admin::count();
        $data['cabangs'] = Admin::where('id_admin', session('login-data')['id'])->first()->hasCabang;
        return view('dashboard', $data);
    }

    public function resetData()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Detail_Kursus::truncate();
        Detail_Transaksi::truncate();
        Fk_detail_siswa::truncate();
        Pembayaran::truncate();
        Siswa::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        return Redirect::back()->with('success', 'Data berhasil di reset');
    }
}
