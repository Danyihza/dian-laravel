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

    public static function generateID($tanggal)
    {
        $data = self::where('jenis_transaksi', 'Pemasukan')->latest()->first();
        if (!$data) {
            $no_transaksi = str_pad(1,2,'0',STR_PAD_LEFT);
            return $no_transaksi;
        }
        $tanggal_last = substr($data->id_detail_transaksi, -13, -3);
        $input_tanggal = date('d/m/Y', $tanggal);
        if ($tanggal_last != $input_tanggal) {
            $no_transaksi = str_pad(1,2,'0',STR_PAD_LEFT);
            return $no_transaksi;
        } else {
            $nourut = (int) substr($data->id_detail_transaksi, -2);
            $no_transaksi = str_pad($nourut+1,2,'0',STR_PAD_LEFT);
            return $no_transaksi;
        }
    }
}
