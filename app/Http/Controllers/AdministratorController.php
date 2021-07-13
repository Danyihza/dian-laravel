<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdministratorController extends Controller
{
    public function listAdminView()
    {
        $data['title'] = 'Administrator';
        return view('admin.listadmin', $data);
    }
}
