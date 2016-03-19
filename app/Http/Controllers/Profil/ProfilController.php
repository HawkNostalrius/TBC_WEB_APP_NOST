<?php

namespace App\Http\Controllers\Profil;

use App\Http\Controllers\Controller;
use App\Http\Requests;

class ProfilController extends Controller
{
    public function index()
    {
        return view('profil.index');
    }
    //
}
