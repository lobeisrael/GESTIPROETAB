<?php

use Illuminate\Support\Facades\Route;

//Controller Espace Parent
use App\Http\Controllers\Parent\ProfilController;
use App\Http\Controllers\Parent\EnfantController;
use App\Http\Controllers\Parent\AnnonceController;
use App\Http\Controllers\Parent\SuiviEnfantController;

Route::prefix('parent')->name('parent.')->group(function () {

    // Profil parent (infos père/mère + mot de passe)
    Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
    Route::post('/profil/password', [ProfilController::class, 'updatePassword'])->name('updatePassword');

    // Liste des enfants
    Route::get('/enfants', [EnfantController::class, 'index'])->name('enfants');

    // Annonces de l'administration
    Route::get('/annonces', [AnnonceController::class, 'index'])->name('annonces');

    // Suivi d’un enfant spécifique
    Route::prefix('enfant')->name('enfant.')->group(function () {
        Route::get('{id}', [SuiviEnfantController::class, 'index'])->name('suivi');

        // Détails : emploi du temps, notes, absences, etc.
        Route::get('{id}/emploiDuTemps', [SuiviEnfantController::class, 'emploiDuTemps'])->name('emploi_du_temps');
        Route::get('{id}/notes', [SuiviEnfantController::class, 'notes'])->name('notes');
        Route::get('{id}/absences', [SuiviEnfantController::class, 'absences'])->name('absences');
        Route::get('{id}/programmation', [SuiviEnfantController::class, 'programmation'])->name('programmation');
        Route::get('{id}/bulletin', [SuiviEnfantController::class, 'bulletin'])->name('bulletin');
        Route::get('{id}/distinctions', [SuiviEnfantController::class, 'distinctions'])->name('distinctions');
    });
});
