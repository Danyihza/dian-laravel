<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $data['title'] = 'dashboard';
        return view('dashboard', $data);
    }
}