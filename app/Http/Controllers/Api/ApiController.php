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
            'program' => 'required'
        ]);
        $cabang = $request->cabang;
        $program = $request->program;
        $nis = Siswa::generateNis($cabang, $program);
        return response()->json([
            'status' => 'success',
            'data' => $nis
        ]);
    }
}
