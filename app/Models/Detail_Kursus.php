<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_Kursus extends Model
{
    use HasFactory;
    protected $table = "detail_kursus";
    protected $primaryKey ="id_detail";
    protected $keyType = 'string';
    protected $fillable = [
        'id_detail',
        'kursus',
        'program',
        'level',
        'hari_kursus',
        'jam_kursus',
        'no_urut',
        'uang_pendaftaran',
        'uang_kursus',
        'uang_ujian_sertifikat',
        'uang_buku',
        'uang_peralatan',
        'jumlah',
        'tanggal_daftar'
    ];

    public function hasKursus()
    {
        return $this->hasOne(Kursus::class, 'id_kursus', 'kursus');
    }

    public function hasLevel()
    {
        return $this->hasOne(Level::class, 'id_level', 'level');
    }

    public function hasProgram()
    {
        return $this->hasOne(Program::class, 'id_program', 'program');
    }

    public function belongsPembayaran()
    {
        return $this->belongsTo(Pembayaran::class, 'id_pembayaran');
    }
}

