<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Siswa extends Model
{
    use HasFactory;
    protected $table = "student";
    protected $primaryKey ="id_siswa";
    protected $keyType = 'string';
    protected $fillable = [
        'id_siswa',
        'nis',
        'nama',
        'kota_lahir',
        'tanggal_lahir',
        'alamat',
        'kota_tinggal',
        'no_telpon',
        'pendidikan',
    ];

    public static function generateNis($cabang, $kursus)
    {
        $latest = DB::table('student')->latest()->first();
        $tahun = substr(date('Y', time()), -2);
        $cabang = str_pad($cabang,2,'0',STR_PAD_LEFT);
        $kursus = str_pad($kursus,2,'0',STR_PAD_LEFT);
        $bulan = date('m', time());
        if (!$latest) {
            $nourut = '01';
            $nis = "$tahun$cabang$kursus$bulan$nourut";
            return $nis;
        }

        $no = (int) substr($latest->nis, -2);
        $bulan = substr($latest->nis, -4, 2);
        
        if ($bulan != date('m', time())) {
            $no = '01';
        } else {
            $no++;
        }

        $bulanNow = date('m', time());
        $nourut = str_pad($no,2,'0',STR_PAD_LEFT);
        $nis = "$tahun$cabang$kursus$bulanNow$nourut";
        return $nis;
    }
}
