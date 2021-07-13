<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
