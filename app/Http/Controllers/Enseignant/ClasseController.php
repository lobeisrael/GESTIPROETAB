<?php

namespace App\Http\Controllers\Enseignant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    public function index() {
        // Liste des classes affectées à l’enseignant
    }

    public function show($classe) {
        // Détails d'une classe + liste élèves
    }

    public function notesIndex($classe) {
        // Voir/saisir notes pour une classe
    }

    public function notesStore($classe) {
        // Enregistrer les notes
    }

    public function evaluationsIndex($classe) {
        // Voir/planifier évaluations
    }

    public function evaluationsStore($classe) {
        // Enregistrer une nouvelle évaluation
    }

    public function copiesIndex($classe) {
        // Voir copies scannées
    }

    public function copiesStore($classe) {
        // Upload copies scannées
    }
}
