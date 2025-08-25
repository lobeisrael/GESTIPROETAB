<?php

namespace App\Http\Controllers\Enseignant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ClasseController extends Controller
{
    public function index() {
        // Liste des classes affectées à l’enseignant
        $matieres = collect([
            (object)['id' => 1, 'nom' => 'Mathématiques'],
            (object)['id' => 2, 'nom' => 'Physique'],
            (object)['id' => 3, 'nom' => 'Histoire-Géo'],
        ]);

        // Classes statiques
        $classes = collect([
            (object)[
                'id' => 1,
                'nom' => '6ème A',
                'niveau' => '6ème',
                'matiere_id' => 1,
                'eleves_count' => 28,
                'cours_count' => 10,
                'devoirs_count' => 3,
                'notes_moyennes' => 14.5,
                'matieres' => collect([$matieres[0], $matieres[1]]),
                'derniere_activite' => Carbon::now()->subDays(2),
            ],
            (object)[
                'id' => 2,
                'nom' => '3ème B',
                'niveau' => '3ème',
                'matiere_id' => 2,
                'eleves_count' => 32,
                'cours_count' => 8,
                'devoirs_count' => 2,
                'notes_moyennes' => 12.8,
                'matieres' => collect([$matieres[1]]),
                'derniere_activite' => Carbon::now()->subDays(5),
            ],
        ]);

        $classesCount = $classes->count();

        return view('enseignant.classes.index', compact('classes', 'matieres', 'classesCount'));

    }

    public function show($classe) {
        // Détails d'une classe + liste élèves
        $classes = [
            [
                'id' => 1,
                'nom' => '6e A',
                'matiere' => 'Mathématiques',
                'nombre_eleves' => 28,
                'niveau' => '6ème',
                'annee_scolaire' => '2024-2025',
                'derniere_activite' => 'Il y a 2 jours'
            ],
            [
                'id' => 2,
                'nom' => '5e B',
                'matiere' => 'Mathématiques',
                'nombre_eleves' => 25,
                'niveau' => '5ème',
                'annee_scolaire' => '2024-2025',
                'derniere_activite' => 'Il y a 1 semaine'
            ],
            [
                'id' => 3,
                'nom' => '4e C',
                'matiere' => 'Physique-Chimie',
                'nombre_eleves' => 30,
                'niveau' => '4ème',
                'annee_scolaire' => '2024-2025',
                'derniere_activite' => 'Il y a 3 jours'
            ],
            [
                'id' => 4,
                'nom' => '3e A',
                'matiere' => 'Mathématiques',
                'nombre_eleves' => 27,
                'niveau' => '3ème',
                'annee_scolaire' => '2024-2025',
                'derniere_activite' => 'Aujourd\'hui'
            ],
            [
                'id' => 5,
                'nom' => '2nd B',
                'matiere' => 'Physique-Chimie',
                'nombre_eleves' => 32,
                'niveau' => '2nde',
                'annee_scolaire' => '2024-2025',
                'derniere_activite' => 'Il y a 5 jours'
            ],
            [
                'id' => 6,
                'nom' => '1ère S',
                'matiere' => 'Mathématiques',
                'nombre_eleves' => 24,
                'niveau' => '1ère',
                'annee_scolaire' => '2024-2025',
                'derniere_activite' => 'Il y a 1 jour'
            ]
        ];

        return view('enseignant.classes.showClasse', compact('classes'));
    }

    public function ListEleve($classe) {
        // Données statiques pour la classe
        $classeData = (object) [
            'id' => 1,
            'nom' => $classe ?: 'Terminale S1',
            'effectif' => 3,
            'moyenne_classe' => 11.89
        ];

        // Évaluations : 2 interros + 1 devoir
        $evaluations = collect([
            [
                'id' => 1,
                'nom' => 'Interro 1',
                'type' => 'interrogation',
                'matiere' => 'Mathématiques',
                'date' => '2024-01-15',
                'coefficient' => 1,
                'note_max' => 20
            ],
            [
                'id' => 2,
                'nom' => 'Interro 2',
                'type' => 'interrogation',
                'matiere' => 'Mathématiques',
                'date' => '2024-02-05',
                'coefficient' => 1,
                'note_max' => 20
            ],
            [
                'id' => 3,
                'nom' => 'Devoir 1',
                'type' => 'devoir',
                'matiere' => 'Mathématiques',
                'date' => '2024-02-20',
                'coefficient' => 2,
                'note_max' => 20
            ],
            [
                'id' => 4,
                'nom' => 'Devoir 1',
                'type' => 'devoir',
                'matiere' => 'Mathématiques',
                'date' => '2024-02-20',
                'coefficient' => 2,
                'note_max' => 20
            ],
            [
                'id' => 5,
                'nom' => 'Devoir 1',
                'type' => 'devoir',
                'matiere' => 'Mathématiques',
                'date' => '2024-02-20',
                'coefficient' => 2,
                'note_max' => 20
            ],
            [
                'id' => 6,
                'nom' => 'Devoir 1',
                'type' => 'devoir',
                'matiere' => 'Mathématiques',
                'date' => '2024-02-20',
                'coefficient' => 2,
                'note_max' => 20
            ],
            [
                'id' => 7,
                'nom' => 'Devoir 1',
                'type' => 'devoir',
                'matiere' => 'Mathématiques',
                'date' => '2024-02-20',
                'coefficient' => 2,
                'note_max' => 20
            ],
            [
                'id' => 8,
                'nom' => 'Devoir 1',
                'type' => 'devoir',
                'matiere' => 'Mathématiques',
                'date' => '2024-02-20',
                'coefficient' => 2,
                'note_max' => 20
            ],
            [
                'id' => 9,
                'nom' => 'Devoir 1',
                'type' => 'devoir',
                'matiere' => 'Mathématiques',
                'date' => '2024-02-20',
                'coefficient' => 2,
                'note_max' => 20
            ],
            [
                'id' => 10,
                'nom' => 'Devoir 1',
                'type' => 'devoir',
                'matiere' => 'Mathématiques',
                'date' => '2024-02-20',
                'coefficient' => 2,
                'note_max' => 20
            ],
            [
                'id' => 11,
                'nom' => 'Devoir 1',
                'type' => 'devoir',
                'matiere' => 'Mathématiques',
                'date' => '2024-02-20',
                'coefficient' => 2,
                'note_max' => 20
            ]
        ]);

        // 3 élèves avec profils variés pour tester toutes les fonctionnalités
        $eleves = collect([
            [
                'id' => 1,
                'matricule' => 'MAT2024001',
                'nom' => 'KOUASSI',
                'prenom' => 'Ange Marie',
                'genre' => 'F',
                'date_naissance' => '2006-03-15',
                'telephone' => '+225 07 12 34 56 78',
                'email' => 'ange.kouassi@email.com',
                'tuteur' => 'M. KOUASSI Jean',
                'notes' => [
                    1 => 18.5,  // Interro 1
                    2 => 17.0,  // Interro 2
                    3 => 16.5   // Devoir 1
                ],
                'moyenne' => 17.25,
                'rang' => 1,
                'statut' => 'excellent',
                'absences' => 0,
                'retards' => 1
            ],
            [
                'id' => 2,
                'matricule' => 'MAT2024002',
                'nom' => 'DIALLO',
                'prenom' => 'Amadou',
                'genre' => 'M',
                'date_naissance' => '2005-08-22',
                'telephone' => '+225 01 23 45 67 89',
                'email' => 'amadou.diallo@email.com',
                'tuteur' => 'Mme DIALLO Fatoumata',
                'notes' => [
                    1 => null,  // Absent à l'Interro 1
                    2 => 12.5,  // Interro 2
                    3 => 11.0   // Devoir 1
                ],
                'moyenne' => 11.75,
                'rang' => 2,
                'statut' => 'moyen',
                'absences' => 2,
                'retards' => 3
            ],
            [
                'id' => 3,
                'matricule' => 'MAT2024003',
                'nom' => 'TRAORE',
                'prenom' => 'Fatoumata',
                'genre' => 'F',
                'date_naissance' => '2006-01-10',
                'telephone' => '+225 05 98 76 54 32',
                'email' => 'fatoumata.traore@email.com',
                'tuteur' => 'M. TRAORE Sekou',
                'notes' => [
                    1 => 8.0,   // Interro 1
                    2 => 9.5,   // Interro 2
                    3 => 7.0    // Devoir 1
                ],
                'moyenne' => 8.17,
                'rang' => 3,
                'statut' => 'difficulte',
                'absences' => 1,
                'retards' => 0
            ]
        ]);

        // Calcul automatique des moyennes si nécessaire
        $eleves = $eleves->map(function ($eleve) use ($evaluations) {
            $totalPoints = 0;
            $totalCoefficients = 0;
            $notesValides = 0;

            foreach ($evaluations as $eval) {
                $note = $eleve['notes'][$eval['id']] ?? null;
                if ($note !== null) {
                    $totalPoints += $note * $eval['coefficient'];
                    $totalCoefficients += $eval['coefficient'];
                    $notesValides++;
                }
            }

            // Recalculer la moyenne si nécessaire
            if ($totalCoefficients > 0) {
                $eleve['moyenne'] = round($totalPoints / $totalCoefficients, 2);

                // Mettre à jour le statut selon la moyenne
                if ($eleve['moyenne'] >= 15) {
                    $eleve['statut'] = 'excellent';
                } elseif ($eleve['moyenne'] >= 10) {
                    $eleve['statut'] = 'moyen';
                } else {
                    $eleve['statut'] = 'difficulte';
                }
            }

            return $eleve;
        });

        // Statistiques pour le dashboard
        $stats = [
            'total_eleves' => $eleves->count(),
            'excellents' => $eleves->where('statut', 'excellent')->count(),
            'moyens' => $eleves->where('statut', 'moyen')->count(),
            'difficultes' => $eleves->where('statut', 'difficulte')->count(),
            'moyenne_classe' => $eleves->avg('moyenne'),
            'total_absences' => $eleves->sum('absences'),
            'total_retards' => $eleves->sum('retards')
        ];

        return view('enseignant.classes.ListEleve', compact(
            'classe',
            'classeData',
            'eleves',
            'evaluations',
            'stats'
        ));
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
