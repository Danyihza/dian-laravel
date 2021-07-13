<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fk_detail_siswa extends Model
{
    use HasFactory;
    protected $table = "fk_detail_siswa";
    protected $fillable = [
        'id_siswa',
        'id_detail_kursus',
    ];

    public function hasSiswa()
    {
        return $this->hasOne(Siswa::class, 'id_siswa', 'id_siswa');
    }

    public function hasDetailKursus()
    {
        return $this->hasOne(Detail_Kursus::class, 'id_detail', 'id_detail_kursus');
    }
}
