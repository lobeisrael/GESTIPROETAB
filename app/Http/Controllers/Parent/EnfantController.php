<?php

namespace App\Http\Controllers\Parent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EnfantController extends Controller
{
    //index
    public function index()
    {
        return view('parent.enfants'); // fichier : resources/views/parent/enfants.blade.php
    }
}
