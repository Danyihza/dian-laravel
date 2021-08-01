<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Cabang;
use App\Models\Fk_detail_siswa;
use App\Models\Program;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;

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
        return view('dashboard', $data);
    }
}
