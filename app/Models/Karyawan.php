<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;
    protected $table = 'karyawan';
    protected $primaryKey = 'id_karyawan';
    protected $keyType = 'string';
    protected $fillable = [
        'id_karyawan',
        'jabatan',
        'no_telepon',
        'cabang'
    ];

    public function hasJabatan()
    {
        return $this->hasOne(Jabatan::class, 'id_jabatan', 'jabatan');
    }

    public function hasCabang()
    {
        return $this->hasOne(Cabang::class, 'id_cabang', 'cabang');
    }
}
