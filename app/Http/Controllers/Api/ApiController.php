<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getNis(Request $request)
    {
        $request->validate([
            'cabang' => 'required',
            'kursus' => 'required'
        ]);
        $cabang = $request->cabang;
        $kursus = $request->kursus;
        $nis = Siswa::generateNis($cabang, $kursus);
        return response()->json([
            'status' => 'success',
            'data' => $nis
        ]);
    }
}
