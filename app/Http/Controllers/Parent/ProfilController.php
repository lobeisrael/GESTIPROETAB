<?php

namespace App\Http\Controllers\Parent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    //index
     public function index()
    {
        return view('parent.profil'); // fichier : resources/views/parent/profil.blade.php
    }
}
