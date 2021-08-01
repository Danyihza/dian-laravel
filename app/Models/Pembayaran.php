<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $table = 'pembayaran';
    protected $primaryKey = 'id_pembayaran';
    protected $keyType = 'string';
    protected $fillable = [
        'id_pembayaran',
        'id_detail_kursus',
        'tanggal_pembayaran',
        'bayar',
        'keterangan',
        'pembayaran_ke'
    ];

    public function hasDetailKursus()
    {
        return $this->hasMany(Detail_Kursus::class, 'id_detail', 'id_detail_kursus');
    }
}
