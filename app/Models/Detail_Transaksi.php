<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_Transaksi extends Model
{
    use HasFactory;
    protected $table = "detail_transaksi";
    protected $primaryKey ="id_detail_transaksi";
    protected $keyType = 'string';
    protected $fillable = [
        'id_detail_transaksi',
        'tanggal',
        'keterangan',
        'jenis_transaksi',
        'jumlah'
    ];
}
