<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function loginView()
    {
        return view('login');
    }

    public function signin(Request $request)
    {
        $username = $request->username;
        $password = hash('sha256', $request->password);
        $admin = Admin::where('username', $username)->first();

        if ($admin) {
            if ($admin->password === $password) {
                $dataLogin = [
                    'id' => $admin->id_admin,
                    'nama' => $admin->nama,
                    'level' => $admin->level,
                ];
                session(['login-data' => $dataLogin]);
                return Redirect::route('dashboard');
            }
        }
    }
}
