<?php

namespace App\Http\Controllers\Parent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ScolariteController extends Controller
{
    ////index
     public function index()
    {
        return view('parent.scolarite.index'); // fichier : resources/views/parent/profil.blade.php
    }

    ////show
     public function show()
    {
        return view('parent.scolarite.show'); // fichier : resources/views/parent/profil.blade.php
    }
}
