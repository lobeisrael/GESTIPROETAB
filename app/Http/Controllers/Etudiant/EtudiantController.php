<?php

namespace App\Http\Controllers\Etudiant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    //index
    public function index()
    {
        // Tu peux charger les données ici avec Eloquent plus tard si tu veux
        return view('etudiant.index');
    }

    //emploiDuTemps
    public function emploiDuTemps($semaine)
    {
        // Tu peux charger les données ici avec Eloquent plus tard si tu veux
        return view('etudiant.emploiDuTemps', compact('semaine'));
    }

    //absences
    public function absences()
    {
        // Tu peux charger les données ici avec Eloquent plus tard si tu veux
        return view('etudiant.absences');
    }

    //notes
    public function notes()
    {
              // Tu peux charger les données ici avec Eloquent plus tard si tu veux
        return view('etudiant.notes');
    }

    //programmation
    public function programmation()
    {
              // Tu peux charger les données ici avec Eloquent plus tard si tu veux
        return view('etudiant.programmationControl');
    }

        //bulletin distinctions
    public function bulletin()
    {
              // Tu peux charger les données ici avec Eloquent plus tard si tu veux
        return view('etudiant.bulletin');
    }

    //distinctions
    public function distinctions()
    {
              // Tu peux charger les données ici avec Eloquent plus tard si tu veux
        return view('etudiant.distinctions');
    }

    //annonces
    public function annonces()
    {
        return view('etudiant.annonces'); // fichier : resources/views/parent/annonces.blade.php
    }

    //annonces historique
    public function historique()
    {
        return view('etudiant.annoncesHistorique'); // fichier : resources/views/parent/annonces.blade.php
    }
}
