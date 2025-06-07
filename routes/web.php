<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.index');
});


Route::prefix('parent')->name('parent.')->group(function () {
    Route::view('/profil', 'parent.profil')->name('profil');
    Route::view('/enfants', 'parent.enfants')->name('enfants');
    Route::view('/annonces', 'parent.annonces')->name('annonces');
});
