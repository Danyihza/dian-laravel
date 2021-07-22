<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uang extends Model
{
    use HasFactory;
    protected $table = "uang";
    protected $primaryKey ="id_uang";
    protected $keyType = 'string';
    protected $fillable = [
        'id_uang',
        'jenis_uang',
        'jumlah',
    ];
}
