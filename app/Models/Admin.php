<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $table = 'admin';
    protected $primaryKey = 'id_admin';
    protected $keyType = 'string';
    protected $fillable = [
        'id_admin',
        'nama',
        'username',
        'password',
        'cabang',
        'level',
    ];

    public function hasCabang()
    {
        return $this->hasOne(Cabang::class, 'id_cabang', 'cabang');
    }
}
