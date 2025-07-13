<?php

namespace App\Http\Controllers\Parent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AnnonceController extends Controller
{
    //index
    public function index()
    {
        return view('parent.annonces'); // fichier : resources/views/parent/annonces.blade.php
    }

    //historique
    public function historique()
    {
        return view('parent.annoncesHistorique'); // fichier : resources/views/parent/annonces.blade.php
    }
}
