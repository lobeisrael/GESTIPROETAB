<?php

use Illuminate\Support\Facades\Route;

//Controller Espace Etudiant
use App\Http\Controllers\Etudiant\EtudiantController;

//Controller Espace Parent
use App\Http\Controllers\Parent\ProfilController;
use App\Http\Controllers\Parent\EnfantController;
use App\Http\Controllers\Parent\AnnonceController;
use App\Http\Controllers\Parent\SuiviEnfantController;
use App\Http\Controllers\Parent\ScolariteController;

//Controller Espace Enseignant
use App\Http\Controllers\Enseignant\DashboardEnseignant;
use App\Http\Controllers\Enseignant\ClasseController;
use App\Http\Controllers\Enseignant\EmploiDuTempsController;
use App\Http\Controllers\Enseignant\DocumentAdministratifController;
use App\Http\Controllers\Enseignant\AnnonceEnseignantController;



//--------- DEBUT PARENT
Route::prefix('parent')->name('parent.')->group(function () {

    // Profil parent (infos père/mère + mot de passe)
    Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
    Route::post('/profil/password', [ProfilController::class, 'updatePassword'])->name('updatePassword');

    // Liste des enfants
    Route::get('/enfants', [EnfantController::class, 'index'])->name('enfants');

    //Suivi de scolarite ScolariteController
    Route::get('/paiements', [ScolariteController::class, 'index'])->name('scolarite');
    Route::get('/paiementsMatricule', [ScolariteController::class, 'show'])->name('scolariteshow');

    // Annonces de l'administration
    Route::get('/annonces', [AnnonceController::class, 'index'])->name('annonces');
    Route::get('/historique', [AnnonceController::class, 'historique'])->name('annonces.historique');

    // Suivi d’un enfant spécifique
    Route::prefix('enfant')->name('enfant.')->group(function () {
        Route::get('{id}', [SuiviEnfantController::class, 'index'])->name('suivi');

        // Détails : emploi du temps, notes, absences, etc.
        Route::get('{id}/emploiDuTemps/{semaine}', [SuiviEnfantController::class, 'emploiDuTemps'])->name('emploi_du_temps');
        Route::get('{id}/notes', [SuiviEnfantController::class, 'notes'])->name('notes');
        Route::get('{id}/absences', [SuiviEnfantController::class, 'absences'])->name('absences');
        Route::get('{id}/programmation', [SuiviEnfantController::class, 'programmation'])->name('programmation');
        Route::get('{id}/bulletin', [SuiviEnfantController::class, 'bulletin'])->name('bulletin');
        Route::get('{id}/distinctions', [SuiviEnfantController::class, 'distinctions'])->name('distinctions');
    });
});
//--------- FIN PARENT


//--------- DEBUT ETUDIANT
Route::prefix('etudiant')->name('etudiant.')->group(function () {

    Route::prefix('monespace')->name('monespace.')->group(function () {
        Route::get('/suivi', [EtudiantController::class, 'index'])->name('suivi');
        Route::get('/emploi-du-temps/{semaine}', [EtudiantController::class, 'emploiDuTemps'])->name('emploi_du_temps');
        Route::get('/notes', [EtudiantController::class, 'notes'])->name('notes');
        Route::get('/absences', [EtudiantController::class, 'absences'])->name('absences');
        Route::get('programmation', [SuiviEnfantController::class, 'programmation'])->name('programmation');
        Route::get('/bulletins', [EtudiantController::class, 'bulletins'])->name('bulletins');
        Route::get('/distinctions', [EtudiantController::class, 'distinctions'])->name('distinctions');
    });

    Route::get('/annonces', [EtudiantController::class, 'annonces'])->name('annonces');
    Route::get('annonces/historique', [AnnonceController::class, 'historique'])->name('annonces.historique');


});
//--------- FIN ETUDIANT

//--------- DEBUT ENSEIGNANT
Route::prefix('enseignant')
    ->name('enseignant.')
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', [DashboardEnseignant::class, 'index'])->name('dashboard');

        // Mes classes (tout dans ClasseController)
        Route::get('/classes', [ClasseController::class, 'index'])->name('classes.index');


        Route::prefix('/classes/{classe}')
        ->name('classes.')
        ->group(function () {
            Route::get('/', [ClasseController::class, 'show'])->name('show');
            Route::get('/ListEleve', [ClasseController::class, 'listEleve'])->name('listEleve');
            Route::get('/note/edit', [ClasseController::class, 'listEleve'])->name('eleve.show');
            Route::get('/note/edit', [ClasseController::class, 'listEleve'])->name('notes.edit');
        });



        Route::get('/classes/{classe}/notes', [ClasseController::class, 'notesIndex'])->name('classes.notes.index');
        Route::post('/classes/{classe}/notes', [ClasseController::class, 'notesStore'])->name('classes.notes.store');

        // Evaluations
        Route::get('/classes/{classe}/evaluations', [ClasseController::class, 'evaluationsIndex'])->name('classes.evaluations.index');
        Route::post('/classes/{classe}/evaluations', [ClasseController::class, 'evaluationsStore'])->name('classes.evaluations.store');

        // Copies scannées
        Route::get('/classes/{classe}/copies', [ClasseController::class, 'copiesIndex'])->name('classes.copies.index');
        Route::post('/classes/{classe}/copies', [ClasseController::class, 'copiesStore'])->name('classes.copies.store');

        // Emploi du temps
        Route::get('/emploi-du-temps', [EmploiDuTempsController::class, 'index'])->name('emploi.index');

        // Documents administratifs
        Route::get('/documents', [DocumentAdministratifController::class, 'index'])->name('documents.index');
        Route::post('/documents', [DocumentAdministratifController::class, 'store'])->name('documents.store');

        // Annonces
        Route::get('/annonces', [AnnonceEnseignantController::class, 'annonces'])->name('annonces');
        Route::get('annonces/historique', [AnnonceEnseignantController::class, 'historique'])->name('annonces.historique');

});
//--------- FIN ENSEIGNANT
