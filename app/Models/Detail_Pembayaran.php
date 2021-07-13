<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_Pembayaran extends Model
{
    use HasFactory;
    protected $table = "detail_pembayaran";
    protected $primaryKey ="id_detail_pembayaran";
    protected $fillable = [
        'id_siswa',
        'id_detail_kursus',
        'pembayaran_1',
        'pembayaran_2',
        'pembayaran_3',
        'pembayaran_4',
        'tanggal',
    ];

    public function hasSiswa()
    {
        return $this->hasOne(Siswa::class, 'id_siswa', 'id_siswa');
    }

    public function hasDetailKursus()
    {
        return $this->hasOne(Detail_Kursus::class, 'id_detail_kursus', 'id_detail');
    }
}