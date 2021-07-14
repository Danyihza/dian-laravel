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

    public function changePasswordView($id_admin)
    {
        $data['title'] = 'Administrator';
        $data['admin'] = Admin::where('id_admin', $id_admin)->first();
        return view('admin.changepassword', $data);
    }

    public function addAdmin(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'username' => 'required',
            'conf_password' => 'required',
            'cabang' => 'required',
            'level' => 'required',
        ],[
            'required' => 'Mohon lengkapi semua form yang ada'
        ]);
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

    public function changePassword(Request $request)
    {
        if ($request->password != $request->conf_password) {
            return Redirect::back()->with('error', 'Password tidak cocok');
        }
        $request->validate([
            'password' => 'required',
            'conf_password' => 'required'
        ],[
            'required' => 'Mohon isi kolom password & konfirmasi password'
        ]);
        $id_admin = $request->id_admin;
        $admin = Admin::where('id_admin', $id_admin)->first();
        $admin->password = hash('sha256', $request->conf_password);
        $admin->save();

        return Redirect::route('listAdminView')->with('success', 'Password berhasil diupdate');
    }
}
