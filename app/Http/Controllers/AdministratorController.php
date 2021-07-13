<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Cabang;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdministratorController extends Controller
{
    public function listAdminView()
    {
        $data['title'] = 'Administrator';
        $data['cabang'] = Cabang::orderBy('created_at', 'ASC')->get();
        $data['admin'] = Admin::orderBy('created_at', 'ASC')->get();
        return view('admin.listadmin', $data);
    }

    public function addAdmin(Request $request)
    {
        if ($request->password != $request->conf_password) {
            return Redirect::back()->with('error', 'Password Tidak Cocok');
        }
        $newAdmin = new Admin();
        $newAdmin->id_admin = Str::random(32);
        $newAdmin->nama = $request->nama;
        $newAdmin->username = $request->username;
        $newAdmin->password = hash('sha256', $request->conf_password);
        $newAdmin->cabang = $request->cabang;
        $newAdmin->level = $request->level;
        $newAdmin->save();
        return Redirect::back()->with('success', 'Data Admin Baru Berhasil Ditambahkan');
    }

    public function removeAdmin($id_admin)
    {
        Admin::where('id_admin', $id_admin)->delete();
        return Redirect::back()->with('success', 'Data Admin Berhasil Dihapus');
    }
}
