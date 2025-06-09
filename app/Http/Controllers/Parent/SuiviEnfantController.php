<?php

namespace App\Http\Controllers\Parent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuiviEnfantController extends Controller
{
    //index
    public function index($id)
    {
        // Tu peux charger les données ici avec Eloquent plus tard si tu veux
        return view('parent.suivi.index', compact('id'));
    }

    //emploiDuTemps
    public function emploiDuTemps()
    {
        // Tu peux charger les données ici avec Eloquent plus tard si tu veux
        return view('parent.suivi.emploiDuTemps');
    }

    //absences
    public function absences()
    {
        // Tu peux charger les données ici avec Eloquent plus tard si tu veux
        return view('parent.suivi.absences');
    }

        //notes
    public function notes()
    {
              // Tu peux charger les données ici avec Eloquent plus tard si tu veux
        return view('parent.suivi.notes');
    }
}
