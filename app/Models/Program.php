<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    protected $table = "program";
    protected $primaryKey ="id_program";
    protected $fillable = [
        'id_program',
        'nama_program',
    ];
    public $timestamps = true;
}
