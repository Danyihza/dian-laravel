<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ArtisanController extends Controller
{
    public function runSeeder()
    {
        Artisan::call('db:seed --class=DataDefaultSeeder');
        return 'Success';
    }
}
