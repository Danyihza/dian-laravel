<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Cabang;
use App\Models\Program;
use App\Models\Siswa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $data['title'] = 'dashboard';
        $data['siswa'] = Siswa::count();
        $data['program'] = Program::count();
        $data['cabang'] = Cabang::count();
        $data['admin'] = Admin::count();
        return view('dashboard', $data);
    }
}
