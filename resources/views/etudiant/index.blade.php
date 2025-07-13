@extends('layouts.app')

@section('styles')
<!-- Tu peux ajouter ici les styles pour les gradients si ce n'est pas déjà dans ton CSS -->
<style>
    .info-student {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 15px;
        padding: 2rem;
        color: white;
        margin-bottom: 2rem;
    }

    .info-student img {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        border: 4px solid rgba(255, 255, 255, 0.3);
        object-fit: cover;
    }

</style>
@endsection

@section('content')

<div class="container-fluid">

    <!-- Breadcrumb / titre -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb bg-white shadow-sm rounded px-4 py-2 align-items-center">
            <li class="breadcrumb-item d-flex align-items-center text-muted mb-0">
                <i class="fa fa-home mr-2 text-primary"></i> Menu Parent
            </li>
            <li class="mx-2 text-secondary">›</li>
            <li class="breadcrumb-item d-flex align-items-center mb-0">
                <a href="{{ route('parent.enfants') }}" class="text-dark">
                     Suivi des Enfants
                </a>
            </li>
            <li class="mx-2 text-secondary">›</li>
            <li class="breadcrumb-item active text-primary font-weight-bold mb-0" aria-current="page">
                 Suivi de l'enfant
            </li>
        </ol>
    </nav>


    <!-- Infos de l'enfant -->
    <div class="info-student d-flex align-items-center">
        <img src="{{ asset('assets/images/user/student.png') }}" alt="Photo de profil">
        <div class="ml-4">
            <h2 class="mb-2 font-weight-bold">{{ Auth::user()->name ?? 'Yasmine Koné' }}</h2>
            <div class="row">
                <div class="col-md-6">
                    <p class="mb-1"><i class="fa fa-graduation-cap mr-2"></i><strong>Classe :</strong> 6e A</p>
                    <p class="mb-1"><i class="fa fa-calendar mr-2"></i><strong>Date de naissance :</strong> 15/03/2012</p>
                    <p class="mb-1"><i class="fa fa-id-card mr-2"></i><strong>Matricule :</strong> ETU2024123456</p>
                </div>
                <div class="col-md-6">
                    <p class="mb-1"><i class="fa fa-envelope mr-2"></i><strong>Email :</strong> yasmine.kone@ecole.ci</p>
                    <p class="mb-1"><i class="fa fa-phone mr-2"></i><strong>Téléphone :</strong> +225 07 12 34 56 78</p>
                    <p class="mb-1"><i class="fa fa-map-marker-alt mr-2"></i><strong>Adresse :</strong> 12 rue de l'école, Abidjan</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Cartes des fonctionnalités -->
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h4 class="card-title mb-3">Aperçu de l'emploi du temps - Semaine en cours</h4>
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>Jour</th>
                        <th>08h - 10h</th>
                        <th>10h - 12h</th>
                        <th>14h - 16h</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Lundi</td>
                        <td>Maths</td>
                        <td>Français</td>
                        <td>Histoire</td>
                    </tr>
                    <tr>
                        <td>Mardi</td>
                        <td>SVT</td>
                        <td>Anglais</td>
                        <td>EPS</td>
                    </tr>
                    <!-- Ajoute d'autres jours ici -->
                </tbody>
            </table>
            <a href="{{ route('parent.enfant.emploi_du_temps', ['id' => 1, 'semaine' => 1]) }}" class="btn btn-outline-primary mt-2">
                Voir l'emploi du temps de l'année <i class="fa fa-arrow-right ml-1"></i>
            </a>
        </div>
    </div>

    {{-- Heures d'absence --}}
    <div class="card shadow-sm mb-4">
        <!-- Résumé des absences -->
        <div class="col-lg-12">
            <div class="card gradient-4 card-hover">
                <div class="card-body text-center">
                    <h4 class="card-title text-white mb-2">Total Absences</h4>
                    <h2 class="display-4 text-white">18h</h2>
                    <p class="mb-0">Année scolaire 2024–2025</p>
                    <i class="fa fa-clock fa-3x opacity-75 mt-2"></i>
                </div>
            </div>
        </div>

        <!-- Tableau des absences récentes -->
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header bg-light d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Absences récentes</h5>
                    <a href="{{ route('parent.enfant.absences', 1) }}" class="btn btn-outline-primary btn-sm">
                        Voir plus de détails <i class="fa fa-arrow-right ml-1"></i>
                    </a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th>Date</th>
                                    <th>Jour</th>
                                    <th>Tranche horaire</th>
                                    <th>Cours</th>
                                    <th>Durée</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>06/06/2025</td>
                                    <td>Vendredi</td>
                                    <td>08h - 10h</td>
                                    <td>Mathématiques</td>
                                    <td>2h</td>
                                </tr>
                                <tr>
                                    <td>29/05/2025</td>
                                    <td>Mercredi</td>
                                    <td>10h - 11h</td>
                                    <td>Physique</td>
                                    <td>1h</td>
                                </tr>
                                <tr>
                                    <td>21/05/2025</td>
                                    <td>Mardi</td>
                                    <td>15h - 17h</td>
                                    <td>Français</td>
                                    <td>2h</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Cartes de navigation --}}
    <div class="row">
        <!-- Notes -->
        <div class="col-lg-3 col-sm-6 mb-4">
            <a href="{{ route('parent.enfant.notes', 1) }}">
                <div class="card gradient-1 card-hover">
                    <div class="card-body">
                        <h4 class="card-title text-white">Notes</h4>
                        <p class="text-white mb-0">Voir les résultats</p>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-file-alt"></i></span>
                    </div>
                </div>
            </a>
        </div>

        <!-- Devoirs & Interros -->
        <div class="col-lg-3 col-sm-6 mb-4">
            <a href="{{ route('parent.enfant.programmation', 1) }}">
                <div class="card gradient-2 card-hover">
                    <div class="card-body">
                        <h4 class="card-title text-white">Devoirs & Interros</h4>
                        <p class="text-white mb-0">Programmation</p>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-calendar-alt"></i></span>
                    </div>
                </div>
            </a>
        </div>

        <!-- Bulletin -->
        <div class="col-lg-3 col-sm-6 mb-4">
            <a href="{{ route('parent.enfant.bulletin', 1) }}">
                <div class="card gradient-3 card-hover">
                    <div class="card-body">
                        <h4 class="card-title text-white">Bulletin</h4>
                        <p class="text-white mb-0">Trimestriel</p>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-book"></i></span>
                    </div>
                </div>
            </a>
        </div>

        <!-- Distinctions -->
        <div class="col-lg-3 col-sm-6 mb-4">
            <a href="{{ route('parent.enfant.distinctions', 1) }}">
                <div class="card gradient-4 card-hover">
                    <div class="card-body">
                        <h4 class="card-title text-white">Distinctions</h4>
                        <p class="text-white mb-0">Tableau d'honneur</p>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-award"></i></span>
                    </div>
                </div>
            </a>
        </div>
    </div>

</div>

@endsection

@section('scripts')
@endsection
